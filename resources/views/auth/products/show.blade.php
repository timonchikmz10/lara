@extends('auth.layouts.master')
@section('title', 'Редагування товара: ' . $product->title)
@section('content')

    <div class="section">
        <!-- container -->
        <div class="container">
            <!-- row -->
            <div class="row">
                <div class="col-md-12">
                    <h1>Товар: {{ $product->title }}</h1>
                    <table class="table">
                        <tbody>
                        <tr>
                            <th>
                                Поле
                            </th>
                            <th>
                                Значення
                            </th>
                        </tr>
                        <tr>
                            <td>ID</td>
                            <td>{{ $product->id }}</td>
                        </tr>
                        <tr>
                            <td>Код</td>
                            <td>{{ $product->code }}</td>
                        </tr>
                        <tr>
                            <td>Назва</td>
                            <td>{{ $product->title}}</td>
                        </tr>
                        <tr>
                            <td>Категорія(id)</td>
                            <td>{{ $product->category->title}}({{$product->category->id}})</td>
                        </tr>
                        <tr>
                            <td>Статус NEW:</td>
                            <td>
                                @if($product->new)
                                    так
                                @else
                                    ні
                                @endif</td>
                        </tr>
                        <tr>
                            <td>Опис</td>
                            <td>{{ $product->description }}</td>
                        </tr>
                        <tr>
                            <td>Картинка</td>
                            <td><img style="height: 240px" src="{{ Storage::url($product->image) }}"
                                ></td>
                        </tr>
                        <tr>
                            <td>Короткий опис</td>
                            <td>{{ $product->short_description }}
                            </td>
                        </tr>
                        <tr>
                            <td>Ціна:</td>
                            <td>{{ $product->price }}</td>
                        </tr>
                        <tr>
                            <td>Акційна ціна:</td>
                            <td>{{ $product->sale_price }}</td>
                        </tr>
                        <tr>
                            <td>Кількість товару:</td>
                            <td>{{ $product->count }}</td>
                        </tr>
                        <tr>
                            <td>Створено:</td>
                            <td>{{ $product->created_at }}</td>
                        </tr>
                        <tr>
                            <td>Остання зміна:</td>
                            <td>{{$product->updated_at}}</td>
                        </tr>
                        <tr>
                            <td>Вага у грамах:</td>
                            <td>{{$product->weight}}</td>
                        </tr>
                        <tr>
                            <td>Кольори:</td>
                            <td>
                                @foreach($product->productProperties as $property)
                                    {{\App\Models\Property::where('id',$property->property_id )->first()->title}},
                                @endforeach
                            </td>
                        </tr>
                        <a style='background-color: #e8a93a' type="button"
                           href="{{route('products.edit', $product)}}" class="but">Змінити товар
                        </a>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
