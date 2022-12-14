<?php $title = 'Создание пользователя' ?>
@extends('user.layout.main')

@section('content')

    <style>
        .profile__form{
            margin-left: 0;
        }
        .profile__form .btn{
            width: unset;
            padding-left: 30px;
            padding-right: 30px;
        }
        .edit_proile__form input[type="text"], .edit_proile__form input[type="tel"], .edit_proile__form input[type="password"], .edit_proile__form input[type="email"]{
            width: 100%;
        }
        .form-row > div:first-of-type{
            margin-right: 15px;
        }
        .form-group{
            margin: 10px 0;
        }
        .form-group label{
            margin-bottom: 10px;
        }
        .input-group-addon {
            padding: 0.5rem 0.75rem;
            margin-bottom: 0;
            font-size: 1rem;
            font-weight: 400;
            line-height: 1.25;
            color: #495057;
            text-align: center;
            background-color: #e9ecef;
            border: 1px solid rgba(0,0,0,.15);
            border-radius: 0.25rem;
        }
        .form-row_{
            display: flex;
            flex-wrap: wrap;
            justify-content: space-between;
        }
        .form-col{
            flex: 0 0 49%;
            max-width: 49%;
        }
        @media (max-width: 460px) {
            .form-col{
                flex: 0 0 100%;
                max-width: 100%;
            }
        }
    </style>
    <main class="user-profile__container">
        <div class="container">
            <div>
                <h1>Создание пользователя</h1>
                <div class="profile">
                    <div class="profile__form">
                        <form method="post" action="{{route('admin.users.store')}}" enctype="multipart/form-data">
                            @csrf
                            @if(session()->has('success'))
                                <div class="alert alert-success">
                                    {{session()->get('success')}}
                                </div>
                            @endif
                            <div class="form-row_">
                                <div class="form-group form-col">
                                    <label for="inputEmail4">Имя</label><span class="text-danger">*</span>
                                    <input type="text" name="name" class="form-control" id="inputEmail4" placeholder="Введите имя">
                                    @error('name')
                                    <div class="text-danger mt-2">
                                        {{$message}}
                                    </div>
                                    @enderror
                                </div>
                                <div class="form-group form-col">
                                    <label for="inputPassword4">Фамилия</label><span class="text-danger">*</span>
                                    <input type="text" name="surname" class="form-control" id="inputPassword4" placeholder="Введите фамилию">
                                    @error('surname')
                                    <div class="text-danger mt-2">
                                        {{$message}}
                                    </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-row_">
                                <div class="form-group form-col">
                                    <label for="inputAddress">Email</label><span class="text-danger">*</span>
                                    <input type="email" name="email" class="form-control" id="inputAddress" placeholder="Введите эл. почту">
                                    @error('email')
                                    <div class="text-danger mt-2">
                                        {{$message}}
                                    </div>
                                    @enderror
                                </div>
                                <div class="form-group form-col">
                                    <label for="inputAddress2">Логин</label><span class="text-danger">*</span>
                                    <input type="text" name="login" class="form-control" id="inputAddress2" placeholder="Введите логин">
                                    @error('login')
                                    <div class="text-danger mt-2">
                                        {{$message}}
                                    </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-row_">
                                <div class="form-group form-col">
                                    <label for="phone">Телефон</label><span class="text-danger">*</span>
                                    <input type="text" name="phone" class="form-control" id="phone">
                                    @error('phone')
                                    <div class="text-danger mt-2">
                                        {{$message}}
                                    </div>
                                    @enderror
                                </div>
                                <div class="form-group form-col">
                                    <label for="inputState">Роль</label>
                                    <select id="inputState" name="role" class="form-select">
                                        <option value="user" selected>Пользователь</option>
                                        <option value="librarian">Библиотекарь</option>
                                        <option value="admin">Админ</option>
                                    </select>
                                    @error('role')
                                    <div class="text-danger mt-2">
                                        {{$message}}
                                    </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Пароль</label><span class="text-danger">*</span>
                                <div class="input-group" id="show_hide_password">
                                    <input class="form-control" name="password" type="password">
                                    <div class="input-group-addon">
                                        <a href=""><i class="fa fa-eye-slash" aria-hidden="true"></i></a>
                                    </div>
                                </div>
                                @error('password')
                                <div class="text-danger mt-2">
                                    {{$message}}
                                </div>
                                @enderror
                            </div>
                            <div class="form-group avatar__input">
                                <label for="inputavatar">Аватар</label><span class="text-danger">*</span>
                                <input type="file" name="avatar" class="form-control" id="inputavatar" accept="image/png,image/jpeg, image/jpg">
                                @error('avatar')
                                <div class="text-danger mt-2">
                                    {{$message}}
                                </div>
                                @enderror
                            </div>
                            <button type="submit" class="btn btn-primary mt-3">Создать</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </main>

@endsection
@section('custom_js')
    <script>
        $(function(){
            $("#phone").mask("+ 7 (999) 999-99-99");
        });
        $(document).ready(function() {
            $("#show_hide_password a").on('click', function(event) {
                event.preventDefault();
                if($('#show_hide_password input').attr("type") == "text"){
                    $('#show_hide_password input').attr('type', 'password');
                    $('#show_hide_password i').addClass( "fa-eye-slash" );
                    $('#show_hide_password i').removeClass( "fa-eye" );
                }else if($('#show_hide_password input').attr("type") == "password"){
                    $('#show_hide_password input').attr('type', 'text');
                    $('#show_hide_password i').removeClass( "fa-eye-slash" );
                    $('#show_hide_password i').addClass( "fa-eye" );
                }
            });
        });
    </script>
@endsection
