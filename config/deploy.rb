set :stages, %w(production staging)
set :default_stage, "staging"
set :application, "realtymlp"
set :repo_url, "git@gitlab.com:realtymlp/realtymlp-new.git"
set :scm, :git

set :user, "ec2-user"

set :branch, "master"

set :ssh_options, {:auth_methods => "publickey"}
set :ssh_options, {:keys => ["realtydig.pem"]}

set :deploy_to, "/var/www/realtymlp"

set :keep_releases, 3

desc "check production task"
task :check_production do

end



namespace :environment do

    desc "Copy Environment Variables"
    task :sync do
        on roles(:app), in: :sequence, wait: 5 do
            within release_path do
                execute :cp, "../../../.env.realtymlp", ".env"
            end
            # execute :echo, "-n /etc/environment", raise_on_non_zero_exit: false
            # fetch(:default_environment).each do |key, value|
            #     execute :echo, "'#{key}=\"#{value}\"' >> /etc/environment"
            # end
            # execute :service, "apache2 restart"
        end
    end

end

namespace :composer do

    desc "Running Composer Self-Update"
    task :update do
        on roles(:app), in: :sequence, wait: 5 do
            # execute :composer, "self-update"
        end
    end

    desc "Running Composer Install"
    task :install do
        on roles(:app), in: :sequence, wait: 5 do
            within release_path  do
                execute :composer, "install --no-dev --quiet"
            end
        end
    end

end

namespace :laravel do

    desc "Setup Laravel folder permissions"
    task :permissions do
        on roles(:app), in: :sequence, wait: 5 do
            within release_path  do
                execute :chmod, "u+x artisan"
                execute :chmod, "-R 777 storage/framework/cache"
                execute :chmod, "-R 777 storage/framework/sessions"
                execute :chmod, "-R 777 storage/framework/views"
                execute :chmod, "-R 777 storage/logs"
                execute :chmod, "-R 777 ."
            end
        end
    end

    desc "Run Laravel Artisan migrate task."
    task :migrate do
        on roles(:app), in: :sequence, wait: 5 do
            within release_path  do
                execute :php, "artisan migrate"
            end
        end
    end

    desc "Run Laravel Artisan seed task."
    task :seed do
        on roles(:app), in: :sequence, wait: 5 do
            within release_path  do
                execute :php, "artisan db:seed"
            end
        end
    end

    desc "Optimize Laravel Class Loader"
    task :optimize do
        on roles(:app), in: :sequence, wait: 5 do
            within release_path  do
                execute :php, "artisan clear-compiled"
                execute :php, "artisan optimize"
            end
        end
    end

end

namespace :deploy do

    after :published, "environment:sync"
    after :published, "composer:update"
    after :published, "composer:install"
    after :published, "laravel:permissions"
    after :published, "laravel:optimize"
    after :published, "laravel:migrate"
    # after :published, "laravel:seed"

end
