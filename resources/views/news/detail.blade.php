@extends('layouts.front')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 mx-auto">
                <h2>ニュース詳細</h2>
                <div class="form-group row">
                        <label class="col-md-2" for="title">タイトル</label>
                        <div class="col-md-10">
                            {{$news->title}}
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-2" for="body">本文</label>
                        <div class="col-md-10">
                            {{$news->body}}
                        </div>
                    </div>

                <div class="row mt-5">
                    <div class="col-md-4 mx-auto">
                        <h2>コメント</h2>

                        <form action="{{ route('news.comment') }}" method="post">
          
                    
                            <div class="form-group row">
                                <label class="col-md-2" for="body">コメント</label>
                                <div class="col-md-10">
                                    <textarea class="form-control" name="comment" rows="20"></textarea>
                                </div>
                            </div>
                        
                            <div class="form-group row">
                                <div class="col-md-10">
                                    <input type="hidden" name="id" value="{{ $news->id }}">
                                    @csrf
                                    <input type="submit" class="btn btn-primary" value="投稿">
                                </div>
                            </div>
                        </form>




                        <ul class="list-group">
                            @if ($news->comments != NULL)
                                @foreach ($news->comments as $comment)
                                    <li class="list-group-item">{{ $comment->comment }}</li>
                                @endforeach
                            @endif
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection