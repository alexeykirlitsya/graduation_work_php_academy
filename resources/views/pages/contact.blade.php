@extends('layouts.app')

@section('title', 'Контакты')

@section('description')
    Страница с формой обратной связи. Средства связи с автором кулинарного блога Вкуснятинка.
@endsection

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="starter-template page_contact">
                <h1>Форма обратной связи</h1>
                <hr>
                <form>
                    <div class="form-group">
                        {{Form::label('email', 'Ваш email', ['class' => 'label_form'])}}
                        {{Form::text('email', '', ['class' => 'form-control', 'id' => 'email', 'placeholder' => 'user@gmail.com'])}}
                    </div>
                    <div class="form-group">
                        {{Form::label('topic', 'Тема письма', ['class' => 'label_form'])}}
                        {{Form::text('topic', '', ['class' => 'form-control', 'id' => 'topic', 'placeholder' => 'Замечания, предложения, пожелания, благодарности'])}}
                    </div>
                    <div class="form-group">
                        {{Form::label('message', 'Текст сообщениния', ['class' => 'label_form'])}}
                        {{Form::textarea('message', '', ['class' => 'form-control', 'id' => 'message', 'placeholder' => 'Текст сообщения'])}}
                    </div>
                    <div class="form-group">
                        {{Form::submit('Отправить письмо', ['class' => 'btn btn-form', 'id' => 'submit'])}}
                    </div>
                    {{--@csrf--}}
                </form>
            </div>
        </div>
    </div>
@endsection

@section('sidebar')
    @include('pages.sidebar')
@endsection

@section('scripts')
    <script>
        $(document).ready(function(){
            $('#submit').click(function(event){
                event.preventDefault();
                var email = $('#email');
                var topic = $('#topic');
                var message = $('#message');
                var success= $('#success');
                var errors= $('#errors');
                
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });

                $.ajax({
                    url: '{{route("post.contact.page")}}',
                    method: 'post',
                    data: {
                        email: email.val(),
                        topic: topic.val(),
                        message: message.val(),
                        _token: "{{ csrf_token() }}"
                    },
                    success: function(data){
                        if(data.errors){
                            errors.find('ul').empty();
                            errors.slideDown();
                            setTimeout(function () {
                                errors.slideUp(2000);
                            }, 3000);
                            $.each(data.errors, function(key, value){
                                errors.find('ul').append("<li>"+ value +"</li>");
                            });
                        } else {
                            success.find('ul').empty();
                            success.slideDown();
                            setTimeout(function () {
                                success.slideUp(2000);
                            }, 3000);
                            success.find('ul').append("<li>"+ data.success +"</li>");
                        }
                    }
                });
                email.val('');
                topic.val('');
                message.val('');
            });
        });
    </script>
@endsection