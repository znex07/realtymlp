<div class="col-md-12">
    <div class="row">
        <div class="panel panel-default search-panel">
            <div class="panel-body">
                <div class="row">
                    <div class="col-md-9">
                        <p class="text-left text-default"><strong> Make a Quick Search</strong></p>
                    </div>
                    <div class=" col-md-3 text-center">

                    </div>
                </div>
                <div class="row">
                    <form method="get" action="/properties/regular">
                        {{--<input type="hidden" value="{{ csrf_token() }}" name="_token"/>--}}
                        <input type="hidden" name="column" id="column" placeholder="column" class="form-control">
                        <div class="form-group col-md-3">
                            <select class="form-control" id="sel1" name="transaction_type">
                                @foreach($transactions as $transaction)
                                    <option value='{{ $transaction->id }}'>{{ $transaction->title }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group col-md-6">
                            <div class="search-prop">
                                {{-- <div class='input-group-addon'><span class="fa fa-map-marker"></span></div> --}}
                                <input type="text" name="location" class="form-control" id="search-property" placeholder="Location">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <button type="submit" class="btn btn-block btn-lg btn-primary"><i class='fa fa-search'></i>
                                Search
                            </button>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>
</div>
