<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    @vite('resources/css/app.css')
    @vite('resources/js/app.js')
</head>

<body>

    <div class="flex items-center gap-4 p-5 whitespace-nowrap" aria-label="Breadcrumb">
        <a href="{{ route('product.create') }}"
            class="py-3 text-center self-center justify-center px-4 items-center gap-x-2 text-sm font-semibold rounded-lg border border-transparent bg-blue-600 text-white hover:bg-blue-700 disabled:opacity-50 disabled:pointer-events-none dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-gray-600">
            Create Product
        </a>
        <a href="{{ route('product.index') }}"
            class="py-3 text-center text-sm self-center justify-center px-4 items-center gap-x-2 font-semibold rounded-lg border border-transparent bg-blue-600 text-white hover:bg-blue-700 disabled:opacity-50 disabled:pointer-events-none dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-gray-600">
            Product List
        </a>
        <a href="{{ route('bill.index') }}"
            class="py-3 text-center text-sm self-center justify-center px-4 items-center gap-x-2 font-semibold rounded-lg border border-transparent bg-blue-600 text-white hover:bg-blue-700 disabled:opacity-50 disabled:pointer-events-none dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-gray-600">
            Sell Product
        </a>

        <a href="{{ route('record.index') }}"
            class="py-3 text-center text-sm self-center justify-center px-4 items-center gap-x-2 font-semibold rounded-lg border border-transparent bg-blue-600 text-white hover:bg-blue-700 disabled:opacity-50 disabled:pointer-events-none dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-gray-600">
            Sold List
        </a>

    </div>
    <hr class=" border-gray-300 my-4">
    <form action="{{ route('product.store') }}" class="flex flex-col gap-2" method="POST">
        @method('post')
        @csrf
        <div class=" flex  ">
            <label for="" class=" w-3/12 ">Barcode: </label>
            <input type="number" name="barcode"
                class="py-3  px-4 w-8/12 block border border-gray-500 rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-slate-900 dark:border-gray-700 dark:text-gray-400 dark:focus:ring-gray-600"
                placeholder="barcode" required>
        </div>
        <div class="flex ">
            <label for="" class=" w-3/12">Product name: </label>
            <input type="text" name="name"
                class="py-3 px-4 block w-8/12 border border-gray-500 rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-slate-900 dark:border-gray-700 dark:text-gray-400 dark:focus:ring-gray-600"
                placeholder="product name" required>
        </div>
        <div class="flex ">
            <label for="" class=" w-3/12">Price: </label>
            <input type="number" name="price"
                class="py-3 px-4 block w-8/12 border border-gray-500 rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-slate-900 dark:border-gray-700 dark:text-gray-400 dark:focus:ring-gray-600"
                placeholder="price" required>

        </div>
        <div class="flex ">
            <label for="" class=" w-3/12"> In Stock: </label>
            <input type="number" name="stock"
                class="py-3 px-4 block w-8/12 border border-gray-500 rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-slate-900 dark:border-gray-700 dark:text-gray-400 dark:focus:ring-gray-600"
                placeholder="stock" required>

        </div>

        <button
            class="py-3 text-center self-center justify-center w-[50%] px-4 items-center gap-x-2 text-sm font-semibold rounded-lg border border-transparent bg-blue-600 text-white hover:bg-blue-700 disabled:opacity-50 disabled:pointer-events-none dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-gray-600">Add</button>




    </form>







</body>

</html>
