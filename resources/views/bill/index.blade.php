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

<body class=" ">

    <div class="flex print:hidden items-center gap-4 p-5 whitespace-nowrap" aria-label="Breadcrumb">
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

    <div class=" flex flex-col gap-4 lg:flex-row lg:justify-center ">

        <form action="{{ route('bill.store') }}" class="flex print:hidden border-2 border-gray-700 p-5 flex-col gap-2"
            method="POST">
            @csrf
            @method('post')
            <div class=" flex  ">
                <label for="" class=" w-3/12 ">Barcode: </label>
                <input type="number" id="barcode" name="barcode"
                    class="py-3 px-4 w-8/12 block border border-gray-500 rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none  dark:border-gray-700 dark:text-gray-400 dark:focus:ring-gray-600"
                    placeholder="barcode" required>

            </div>
            <div class="flex ">
                <label for="product_id" class=" w-3/12">Product: </label>
                <select name="product_id" id="product_id"
                    class="py-3 px-4 block w-8/12 border border-gray-500 rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none  dark:border-gray-700 dark:text-gray-400 dark:focus:ring-gray-600">
                    <option value="">Select product first</option>
                    @foreach ($products as $product)
                        <option value="{{ $product->id }}">{{ $product->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="flex ">
                <label for="" class=" w-3/12">Price: </label>
                <input type="number" id="productPrice" name="price"
                    class="py-3 px-4 block w-8/12 border border-gray-500 rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none  dark:border-gray-700 dark:text-gray-400 dark:focus:ring-gray-600"
                    placeholder="price" required>

            </div>
            <div class="flex ">
                <label for="" class=" w-3/12">Quantity: </label>
                <input type="number" id="productQuantity" name="quantity"
                    class="py-3 px-4 block w-8/12 border border-gray-500 rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none  dark:border-gray-700 dark:text-gray-400 dark:focus:ring-gray-600"
                    placeholder="quantity" required>

            </div>
            <div class="flex ">
                <label for="" class=" w-3/12">Available Quantity: </label>
                <input type="number" id="productStock" name="stock"
                    class="py-3 px-4 block w-8/12 border border-gray-500 rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none  dark:border-gray-700 dark:text-gray-400 dark:focus:ring-gray-600"
                    placeholder="stock">

            </div>

            <button
                class="py-3 text-center self-center justify-center w-[50%] px-4 items-center gap-x-2 text-sm font-semibold rounded-lg border border-transparent bg-blue-600 text-white hover:bg-blue-700 disabled:opacity-50 disabled:pointer-events-none dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-gray-600">Buy</button>




        </form>



        <div class=" p-5 border-2 border-black">
            <div>
                <button id="print"
                    class="py-3 print:hidden text-center self-center justify-center  px-4 items-center gap-x-2 text-sm m-3 font-semibold rounded-lg border border-transparent bg-blue-600 text-white hover:bg-blue-700 disabled:opacity-50 disabled:pointer-events-none dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-gray-600">Print</button>

                @php
                    $latestVoucherNumber =
                        optional(collect($records)->sortByDesc('voucher_number')->first())->voucher_number ?? 0;
                @endphp
                <form action="{{ route('record.store') }}" id="voucher-form" method="POST">
                    @csrf
                    @method('post')
                    <input type="hidden" name="voucher" value="{{ $latestVoucherNumber + 1 }}">
                    <input type="hidden" id="paidBy" name="paid_by" value="cash">
                </form>


                <button onclick="document.getElementById('voucher-form').submit();"
                    class="py-3 print:hidden text-center self-center justify-center  px-4 items-center gap-x-2 text-sm m-3 font-semibold rounded-lg border border-transparent bg-blue-600 text-white hover:bg-blue-700 disabled:opacity-50 disabled:pointer-events-none dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-gray-600">Save
                    and New Voucher</button>
                <h1 class=" text-right font-bold">
                    V-{{ $latestVoucherNumber + 1 }}</h1>


            </div>
            <div>
                <div class="flex flex-col">
                    <div class="-m-1.5 overflow-x-auto">
                        <div class="p-1.5 min-w-full inline-block align-middle">
                            <div
                                class="border rounded-lg shadow overflow-hidden dark:border-neutral-700 dark:shadow-gray-900">
                                <table class="min-w-full divide-y divide-gray-200 dark:divide-neutral-700">
                                    <thead>
                                        <tr class="divide-x divide-gray-200 dark:divide-neutral-700">
                                            <th scope="col"
                                                class="px-6 py-3 text-start text-xs font-bold text-gray-900 uppercase dark:text-neutral-500">
                                                Name</th>
                                            <th scope="col"
                                                class="px-6 py-3 text-start text-xs font-bold text-gray-900 uppercase dark:text-neutral-500">
                                                Quantity</th>
                                            <th scope="col"
                                                class="px-6 py-3 text-start text-xs font-bold text-gray-900 uppercase dark:text-neutral-500">
                                                Price</th>
                                            <th scope="col"
                                                class="px-6 py-3 text-start text-xs font-bold text-gray-900 uppercase dark:text-neutral-500">
                                                Cost</th>
                                            <th scope="col"
                                                class="px-6 py-3 text-end text-xs font-bold text-gray-900 uppercase dark:text-neutral-500">
                                                Action</th>
                                        </tr>
                                    </thead>
                                    <tbody class="divide-y divide-gray-200 dark:divide-neutral-700">
                                        @foreach ($bills as $bill)
                                            <tr class=" divide-x divide-gray-200">
                                                <td
                                                    class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-800 dark:text-neutral-200">
                                                    {{ $bill->product->name }}</td>
                                                <td
                                                    class="px-6 py-4 whitespace-nowrap text-sm text-gray-800 dark:text-neutral-200">
                                                    {{ $bill->quantity }}</td>
                                                <td
                                                    class="px-6 py-4 whitespace-nowrap text-sm text-gray-800 dark:text-neutral-200">
                                                    {{ $bill->product->price }}</td>
                                                <td
                                                    class="px-6 py-4 whitespace-nowrap text-sm text-gray-800 dark:text-neutral-200">
                                                    {{ $bill->cost }} </td>
                                                <td class="px-6 py-4 whitespace-nowrap text-end text-sm font-medium">
                                                    <form action="{{ route('bill.destroy', $bill->id) }}"
                                                        method="POST">
                                                        @csrf
                                                        @method('delete')

                                                        <button type="submit"
                                                            class="inline-flex items-center gap-x-2 text-sm font-semibold rounded-lg border border-transparent text-blue-600 hover:text-blue-800 disabled:opacity-50 disabled:pointer-events-none dark:text-blue-500 dark:hover:text-blue-400">Delete</button>

                                                    </form>
                                                </td>
                                            </tr>
                                        @endforeach

                                    </tbody>

                                    <tfoot>

                                        <tr class=" divide-x divide-gray-200">
                                            <td colspan="1"
                                                class="px-6 py-4 whitespace-nowrap text-sm font-bold text-gray-800 dark:text-neutral-200">
                                                Paid By</td>
                                            <td colspan="1"
                                                class="px-6 py-4 whitespace-nowrap text-sm font-bold text-gray-800 dark:text-neutral-200">
                                                <select name="paid_by"
                                                    onchange="document.getElementById('paidBy').value = this.value">
                                                    <option value="cash">cash</option>
                                                    <option value="banking">Kpay</option>
                                                </select>
                                            </td>

                                            <td
                                                class="px-6 py-4 whitespace-nowrap text-sm font-bold text-gray-800 dark:text-neutral-200">
                                                Total</td>
                                            <td colspan="2"
                                                class="px-6 py-4 whitespace-nowrap text-sm font-bold text-gray-800 dark:text-neutral-200">
                                                {{ collect($bills)->sum('cost') }}</td>

                                        </tr>
                                    </tfoot>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>




    <script>
        const product = document.querySelector("#product_id");
        const toPrint = document.querySelector("#print");
        // console.log(product)

        toPrint.addEventListener("click", () => {
            print()
        })

        product.addEventListener("change", (e) => {
            console.log('helo')

            const prodcutId = e.target.value

            fetch(`product/${prodcutId}`).then((res) => res.json()).then((
                data) => {
                console.log(data)
                document.querySelector("#barcode").value = data.barcode;
                document.querySelector("#productPrice").value = data.price;
                document.querySelector("#productQuantity").value = 1;
                document.querySelector("#productStock").value = data.stock;

            }).catch((error) => {
                console.error("Error fetching product data:", error)
                document.querySelector("#productName").value = "";
                document.querySelector("#productPrice").value = "";
                document.querySelector("#productQuantity").value = 0;
                document.querySelector("#productStock").value = "";
                alert("no product with this code");
                e.target.value = ""

            });


        });
    </script>


</body>

</html>
