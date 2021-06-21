<?php

namespace App\Jobs\User;

use App\Jobs\Job;
use App\User;
use Illuminate\Contracts\Bus\SelfHandling;
use Image;

class ChangeAvatar extends Job implements SelfHandling
{
    private $request;
    private $userID;
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($request, $userID)
    {
        $this->request = $request;
        $this->userID = $userID;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        // dd($this->request->file('image')->isValid(), $this->userID);
        try {
            $user = User::findOrFail($this->userID);
        } catch (Exception $exs) {
            return false;
        }
        $imgDir = public_path() . '/avatars/';
        $file = $this->request->file('image');
        $filename = time() . '.' . $file->getClientOriginalExtension();
        $image = Image::make($file->getRealPath())->fit(250, 250)->save($imgDir . $filename);
        $user->profile_image = $filename;
        $user->save();

        return $user;
    }
}
