@extends('template.main')

@section('title', 'Codebook')

@section('content')

    <div class="row gap-20 masonry pos-r">
        <div class="masonry-sizer col-md-6"></div>
        <div class="masonry-item col-md-6">
            <div class="bgc-white p-20 bd">
                <h5 class="text-left">{{ucfirst($name)}} CRUD</h5>
                <div id="container" class = 'containerBox'>
                    <form action='/codebook' method='post'>
                        @csrf
                        @method('post')
                        <input type="hidden" name="_name" value="{{$name}}">
                        @if(session('status'))
                            <div class="alert alert-success" role="alert">{{session('status')}}
                                <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
                            </div>
                        @endif
                        @if(session('error'))
                            <div class="alert alert-danger" role="danger">{{session('error')}}
                                <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
                            </div>
                        @endif
                        @if($errors->any())
                            <div class="alert alert-danger" role="alert">{{$errors->first()}}
                                <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
                            </div>
                        @endif
                        <label for="name">{{ucfirst($name)}}:</label>
                        <input type="text" id="name" name = 'name' placeholder="Add new {{ucfirst($name)}}" autocomplete="off" required>
                        <input type = 'submit' value="Create" class='btn btn-success btn-block' >
                    </form>
                    <form action='codebook/0' method='post'>
                        @csrf
                        @method('delete')
                        <input type="hidden" name="_name" value="{{$name}}">
                        <label for="list">{{ucfirst($name)}} List:</label>
                        <select id="list" name="id" size=10>
                            @foreach($data as $obj)
                                <option value="{{$obj->id}}">{{$obj->name}}</option>
                            @endforeach
                        </select>
                        <div>
                            <input type = 'submit'  class = 'btn btn-danger' value = 'Remove' onclick="if(this.form['list'].value == '' || !confirm('Are u sure?'))event.preventDefault();">
                            <input type="hidden" name = '{{$name}}'>
                            <input type = 'button'  onclick="this.form['_method'].value = 'put'; if(this.form['{{$name}}'].value = prompt('Update coutntry',this.form['list'].options[this.form['list'].selectedIndex].text))this.form.submit();" class = 'btn btn-primary' value = 'Update'>

                        </div>
                    </form>
                </div>
            </div>
        </div>

    </div>


@endsection
