<x-layout>
    <div class="m-4">
        <nav class="flex justify-between items-center mb-4">
            <div class="text-xl font-bold">
                <i class="fa fa-list mx-4 "></i> List of Income
            </div>
            <button class="text-lg font-bold hover:text-laravel mx-4" onclick="my_modal.showModal()"><i
                    class="fa-regular fa-square-plus pr-2"></i>Add Income
            </button>
        </nav>

        @if (count($errors) > 0)
            <script type="text/javascript">
                document.getElementById('my_modal').showModal();
            </script>
        @endif
        <dialog id="my_modal" class="modal">
            <div class="modal-box">
                <form method="dialog">
                    <button class="btn btn-sm btn-circle btn-ghost absolute right-2 top-2">✕</button>
                </form>
                @include('components.income-form')
            </div>
        </dialog>
        <div
            class="rounded max-w-lg mx-auto mt-2"
        >
            <div class="card bg-red-100 shadow-xl m-4 p-2 flex flex-row justify-around">
                {{--                    <div class="card-body">--}}


                <div class="text-2xl font-bold">Field Name</div>

                <div class="text-2xl font-bold">Amount</div>
                <div class="card-actions ">
                    Action
                </div>
            </div>
            @foreach($incomeList as $list)
                <div class="card bg-cyan-100 shadow-xl m-4 p-2 flex flex-row justify-around">
                    {{--                    <div class="card-body">--}}


                        <div class="text-2xl font-bold">{{$list->field}}</div>

                        <div class="text-2xl font-bold">{{$list->amount}}</div>
                    <div class="card-actions ">
                        <form action="" >
                            @csrf
                            <button type="submit" class="fa fa-edit mx-2"></button>
                        </form>
                        <form method="POST" action="/incomes/{{$list->id}}" >
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="fa fa-xmark mx-2"></button>
                        </form>
                    </div>
                </div>
            @endforeach
        </div>
        <div class="m-4 p-4 relative">
            <div class="fixed bottom-8">

                {{$incomeList->links()}}</div>
        </div>
    </div>
</x-layout>
