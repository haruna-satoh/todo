@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/index.css') }}">
@endsection

@section('content')
<div class="todo__alert">
    @if (session('message'))
    <div class="todo__alert--success">
        {{-- Todoを作成しました --}}
        {{ session('message') }}
    </div>
    @endif
    @if ($errors->any())
    <div class="todo__alert--danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{  $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif
</div>

<div class="todo__content">
    <div class="section__title">
        <h2>新規作成</h2>
    </div>
    <form action="/todos" method="post" class="create-form">
    @csrf
        <div class="create-form__item">
            <input type="text" name="content" value="{{ old('content') }}" class="create-form__item-input" />
            <select name="category_id" id="" class="create-form__item-select">
                @foreach ($categories as $category)
                    <option value="{{ $category['id'] }}">{{ $category['name'] }}</option>
                @endforeach
                {{-- <option value="">カテゴリ</option> --}}
            </select>
        </div>
        <div class="create-form__button">
            <button class="create-form__button-submit" type="submit">作成</button>
        </div>
    </form>
    <div class="section__title">
        <h2>Todo検索</h2>
    </div>
    <form action="" class="search-form">
        <div class="search-form__item">
            <input type="text" class="search-form__item-input" />
            <select name="" id="" class="search-form__item-select">
                <option value="">カテゴリ</option>
            </select>
        </div>
        <div class="search-form__button">
            <button class="search-form__button-submit" type="submit">検索</button>
        </div>
    </form>
    <div class="todo-table">
        <table class="todo-table__inner">
            <tr class="todo-table__row">
                {{-- <th class="todo-table__header">Todo</th> --}}
                <th class="todo-table__header">
                    <span class="todo-table__header-span">Todo</span>
                    <span class="todo-table__header-span">カテゴリ</span>
                </th>
            </tr>
            @foreach ($todos as $todo)
            <tr class="todo-table__row">
                <td class="todo-table__item">
                    <form action="/todos/update" method="post" class="update-form">
                        @method('patch')
                        @csrf
                        <div class="update-form__item">
                            {{-- <input type="text" name="content" value="test" class="update-form__item-input"> --}}
                            {{-- <p class="update-form__item-input">{{ $todo['content'] }}</p> --}}
                            <input type="text" name="content" value="{{ $todo['content'] }}" class="update-form__item-input">
                            <input type="hidden" name="id" value="{{ $todo['id'] }}">
                        </div>
                        <div class="update-form__item">
                            {{-- <p class="update-form__item-p">Category 1</p> --}}
                            <p class="update-form__input-p">{{ $todo['category']['name'] }}</p>
                        </div>
                        <div class="update-form__button">
                            <button class="update-form__button-submit" type="submit">更新</button>
                        </div>
                    </form>
                </td>
                <td class="todo-table__item">
                    <form action="/todos/delete" method="post" class="delete-form">
                        @method('delete')
                        @csrf
                        <div class="delete-form__button">
                            <input type="hidden" name="id" value="{{ $todo['id'] }}">
                            <button class="delete-form__button-submit" type="submit">削除</button>
                        </div>
                    </form>
                </td>
            </tr>
            @endforeach
            {{-- <tr class="todo-table__row">
                <td class="todo-table__item">
                    <form action="" class="update-form">
                        <div class="update-form__item">
                            <input type="text" name="content" value="test2" class="update-form__item-input">
                        </div>
                        <div class="update-form__button">
                            <button class="update-form__button-submit" type="submit">更新</button>
                        </div>
                    </form>
                </td>
                <td class="todo-table__item">
                    <form action="" class="delete-form">
                        <div class="delete-form__button">
                            <button class="delete-form__button-submit" type="submit">削除</button>
                        </div>
                    </form>
                </td>
            </tr> --}}
        </table>
    </div>
</div>
@endsection