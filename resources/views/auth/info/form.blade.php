@extends('auth.layouts.master')
@isset($info)
    @section( 'title', 'Змінити загальну інформацію')
@else
    @section('title', 'Додати загальну інформацію')
@endisset
@section('content')
    <style>
        .butt {
            background-color: #4CAF50; /* Green */
            border: none;
            color: white;
            padding: 15px 32px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 16px;
        }
    </style>
    <div class="section">
        <!-- container -->
        <div class="container">
            <!-- row -->
            <div class="row">
                <div class="col-md-7">
                    <div class="billing-details">
                        <div class="section-title">
                            @isset($info)
                                <h3 class="title"><b> Змінити загальну інформацію</b></h3>
                            @else
                                <h3 class="title"><b> Створити загальну інформацію</b></h3>
                            @endisset
                        </div>
                        <form action="
                    @isset($info)
                    {{route('info.update', $info)}}
                    @else
                    {{route('info.store')}}
                    @endisset
                    " method="POST" enctype="multipart/form-data">
                            @isset($info)
                                @method('PUT')
                                @csrf
                                <div class="form-group">
                                    <label for="email">email:</label>
                                    @include('layouts.errors', ['fieldName'=>'email'])
                                    <input value="{{old('email', $info->email)}}" class="input" id="email" name="email">
                                </div>
                                <div class="form-group">
                                    <label for="second_email">Додатковый email:</label>
                                    @include('layouts.errors', ['fieldName'=>'email'])
                                    <input value="{{old('second_email',$info->second_email)}}" class="input" id="second_email" name="second_email">
                                </div>
                                <div class="form-group">
                                    <label for="phone">Телефон:</label>
                                    @include('layouts.errors', ['fieldName'=>'phone'])
                                    <input value="{{old('phone', $info->phone)}}" class="input" id="phone" name="phone">
                                </div>
                                <div class="form-group">
                                    <label for="second_phone">Додатковый телефон:</label>
                                    @include('layouts.errors', ['fieldName'=>'phone'])
                                    <input value="{{old('second_phone',$info->second_phone)}}" class="input" id="second_phone" name="second_phone">
                                </div>
                                <div class="form-group">
                                    <label for="address">Адреса:</label>
                                    @include('layouts.errors', ['fieldName'=>'address'])
                                    <input value="{{old('address' ,$info->address)}}" class="input" id="address" name="address">
                                </div>
                                <div class="order-notice">
                                    <label for="short_description">Короткий опис: </label>
                                    @include('layouts.errors', ['fieldName'=>'short_description'])
                                    <textarea name="short_description" id="short_description"
                                              class="input">{{old('short_description', $info->short_description)}}</textarea>
                                </div>
                                <div class="order-notice">
                                    <label for="description">Опис: </label>
                                    @include('layouts.errors', ['fieldName'=>'description'])
                                    <textarea name="description" id="description"
                                              class="input">{{old('description', $info->description)}}</textarea>
                                </div>

                                <div class="order-notice">
                                    <label for="privacy_policy">Політика магазину </label>
                                    @include('layouts.errors', ['fieldName'=>'privacy_policy'])
                                    <textarea name="privacy_policy" id="privacy_policy"
                                              class="input">{{old('privacy_policy', $info->privacy_policy)}}</textarea>
                                </div>
                                <div class="form-group">
                                    <label for="instagram">Посилання на Instagram:</label>
                                    @include('layouts.errors', ['fieldName'=>'instagram'])
                                    <input value="{{old('instagram', $info->instagram)}}" class="input" id="instagram" name="instagram">
                                </div>
                                <div class="form-group">
                                    <label for="facebook">Посилання на Facebook:</label>
                                    @include('layouts.errors', ['fieldName'=>'facebook'])
                                    <input value="{{old('facebook', $info->facebook)}}" class="input" id="facebook" name="facebook">
                                </div>
                                <div class="form-group">
                                    <label for="twitter">Посилання на Twitter:</label>
                                    @include('layouts.errors', ['fieldName'=>'twitter'])
                                    <input value="{{old('twitter', $info->twitter)}}" class="input" id="twitter" name="twitter">
                                </div>
                                <div class="input-group row">
                                    <label for="image" class="col-sm-2 col-form-label">Логотип: </label>
                                    <div class="col-sm-10">
                                        <tr>
                                            <td>Сучасный</td>
                                            <td><img src="{{asset(Storage::url($info->image)) }}"
                                                     style="height: 240px"></td>
                                        </tr>
                                        <label class="btn btn-default btn-file">
                                            Завантажити <input type="file" style="display: none;" name="image" id="image">
                                        </label>
                                    </div>
                                </div>
                                <button type='submit' class="butt">Збергти</button>
                            @else
                                @csrf
                                <div class="form-group">
                                    <label for="email">email:</label>
                                    @include('layouts.errors', ['fieldName'=>'email'])
                                    <input value="{{old('email')}}" class="input" id="email" name="email">
                                </div>
                                <div class="form-group">
                                    <label for="second_email">Додатковый email:</label>
                                    @include('layouts.errors', ['fieldName'=>'email'])
                                    <input value="{{old('second_email')}}" class="input" id="second_email" name="second_email">
                                </div>
                                <div class="form-group">
                                    <label for="phone">Телефон:</label>
                                    @include('layouts.errors', ['fieldName'=>'phone'])
                                    <input value="{{old('phone')}}" class="input" id="phone" name="phone">
                                </div>
                                <div class="form-group">
                                    <label for="second_phone">Додатковый телефон:</label>
                                    @include('layouts.errors', ['fieldName'=>'phone'])
                                    <input value="{{old('second_phone')}}" class="input" id="second_phone" name="second_phone">
                                </div>
                                <div class="form-group">
                                    <label for="address">Адреса:</label>
                                    @include('layouts.errors', ['fieldName'=>'address'])
                                    <input value="{{old('address')}}" class="input" id="address" name="address">
                                </div>
                                <div class="order-notice">
                                    <label for="short_description">Короткий опис: </label>
                                    @include('layouts.errors', ['fieldName'=>'short_description'])
                                    <textarea name="short_description" id="short_description"
                                              class="input">{{old('short_description')}}</textarea>
                                </div>
                                <div class="order-notice">
                                    <label for="description">Опис: </label>
                                    @include('layouts.errors', ['fieldName'=>'description'])
                                    <textarea name="description" id="description"
                                              class="input">{{old('description')}}</textarea>
                                </div>

                                <div class="order-notice">
                                    <label for="privacy_policy">Політика магазину </label>
                                    @include('layouts.errors', ['fieldName'=>'privacy_policy'])
                                    <textarea name="privacy_policy" id="privacy_policy"
                                              class="input">{{old('privacy_policy')}}</textarea>
                                </div>
                                <div class="form-group">
                                    <label for="instagram">Посилання на Instagram:</label>
                                    @include('layouts.errors', ['fieldName'=>'instagram'])
                                    <input value="{{old('instagram')}}" class="input" id="instagram" name="instagram">
                                </div>
                                <div class="form-group">
                                    <label for="facebook">Посилання на Facebook:</label>
                                    @include('layouts.errors', ['fieldName'=>'facebook'])
                                    <input value="{{old('facebook')}}" class="input" id="facebook" name="facebook">
                                </div>
                                <div class="form-group">
                                    <label for="twitter">Посилання на Twitter:</label>
                                    @include('layouts.errors', ['fieldName'=>'twitter'])
                                    <input value="{{old('twitter')}}" class="input" id="twitter" name="twitter">
                                </div>
                                <div class="input-group row">
                                    <label for="image" class="col-sm-2 col-form-label">Логотип: </label>
                                    <div class="col-sm-10">
                                        <label class="btn btn-default btn-file">
                                            Завантажити <input type="file" style="display: none;" name="image" id="image">
                                        </label>
                                    </div>
                                </div>
                                <button type='submit' class="butt">Стоворити</button>
                            @endisset
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
