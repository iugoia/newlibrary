<?php $title = 'Все бронирования' ?>

@extends('user.layout.main')

@section('content')
    <style>
        .admin__users__table h1{
            margin: 20px 0;
        }
        .admin__users__table__wrapper{
            display: block;
            overflow-x: auto;
            white-space: nowrap;
        }
        .admin__user__title__ctn a{
            width: unset;
            margin-left: 20px;
            display: unset;
        }
        .admin__icons__a button{
            position: absolute;
            width: 100%;
            height: 100%;
        }
        .form__icon button{
            border: none;
        }
        table{
            text-align: center;
        }
        @media (max-width: 737px) {
            .admin__users__table{
                margin-left: 0;
            }
        }
        @media (max-width: 820px) {
            .admin__user__title__ctn > h1{
                flex: 0 0 100%;
            }
            .admin__user__title__ctn a{
                margin-left: 0;
                margin-bottom: 20px;
            }
        }
        @if (\Illuminate\Support\Facades\DB::table('books')->count() < 10)
            footer{
            position: absolute;
            bottom: 0;
        }
        @endif
        @if (\Illuminate\Support\Facades\DB::table('books')->count() >= 10)
            footer{
            position: unset;
        }
        @endif
    </style>
    <main>
        <section class="admin__users__table user-profile__container">
            <div class="container">
                <h1>Все бронирования</h1>
                @if(session()->has('success'))
                    <div class="alert alert-success">
                        {{session()->get('success')}}
                    </div>
                @endif
                @if(session()->has('error'))
                    <div class="alert alert-danger">
                        {{session()->get('error')}}
                    </div>
                @endif
                <div class="admin__users__table__wrapper">
                    <table class="admin__users__table__table table align-middle mb-0">
                        <thead class="table-light">
                        <tr>
                            <th>#ID</th>
                            <th>Книга</th>
                            <th>Стеллаж</th>
                            <th>Ряд</th>
                            <th>Полка</th>
                            <th>Статус</th>
                            <th>Дата бронирования</th>
                            <th>Дата конца бронирования</th>
                            <th>Пользователь</th>
                            <th>Номер телефона</th>
                            <th>Действия</th>
                        </tr>
                        </thead>
                        <tbody>
                        @for($i = 0; $i < count($arrDataList); $i++)
                            <tr>
                                <td>{{$arrDataList[$i]['id']}}</td>
                                <td>
                                    <div class="d-flex align-items-center gap-3">
                                        <div class="product-box border">
                                            <img src="{{asset('storage/' . $arrDataList[$i]['bookimage'])}}" alt="{{$arrDataList[$i]['book']}}">
                                        </div>
                                        <div class="product-info">
                                            <h6 class="product-name mb-1">{{$arrDataList[$i]['book']}}</h6>
                                        </div>
                                    </div>
                                </td>
                                <td>{{$arrDataList[$i]['bookrack']}}</td>
                                <td>{{$arrDataList[$i]['bookrow']}}</td>
                                <td>{{$arrDataList[$i]['bookshelf']}}</td>
                                <td>{{$arrDataList[$i]['status']}}</td>
                                <td>{{$arrDataList[$i]['created_at']}}</td>
                                <td>{{$arrDataList[$i]['received_time']}}</td>
                                <td>{{$arrDataList[$i]['username']}}</td>
                                <td>{{$arrDataList[$i]['userphone']}}</td>
                                <td class="admin__users__nav">
                                    <div class="d-flex align-items-center gap-3 fs-6">
                                        <a href="{{route('librarian.reservations.edit', $arrDataList[$i]['id'])}}">
                                            <i class="fa-solid fa-pen text-primary"></i>
                                        </a>
                                        <a target="_blank" href="{{route('showPageBook', $books[$i])}}">
                                            <i class="fa-solid fa-eye"></i>
                                        </a>
                                        <form class="form__icon" id="form_delete" action="{{route('librarian.reservations.destroy', $arrDataList[$i]['id'])}}" method="post">
                                            @csrf
                                            @method('delete')
                                            <button type="submit">
                                                <i class="fa-solid fa-trash text-danger"></i>
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @endfor
                        </tbody>
                    </table>
                </div>
            </div>
        </section>
    </main>
@endsection
