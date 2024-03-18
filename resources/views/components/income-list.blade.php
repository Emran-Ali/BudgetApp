<x-layout>
    <div class="m-4">
        <nav class="flex justify-around flex-row items-center mb-4">

                <div class="text-2xl font-bold"><i class="fa font-bold fa-list mx-4 "></i> List of Income </div>
                <form action="incomes/filter" method="post" class="flex">
                    @csrf
                    <input name="date"  type="month" class=" border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2 m-2 " placeholder="Select date">
                    <button type="submit" class="text-lg font-bold hover:text-laravel ">Filter</button>
                </form>

            <button class="text-lg font-bold hover:text-laravel mx-4" onclick="my_modal.showModal()"><i
                    class="fa-regular fa-square-plus pr-2"></i>Add Income
            </button>
        </nav>


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
            @if(count($incomeList))
                <div class="card bg-red-100 shadow-xl m-4 p-2 flex flex-row justify-around">
                <div class="text-2xl font-bold">Income Source</div>

                <div class="text-2xl font-bold">Amount</div>
                <div class="card-actions text-xl font-bold">
                    Action
                </div>
                </div>
            @foreach($incomeList as $list)
                <div class="card bg-cyan-100 shadow-xl m-4 p-2 flex flex-row justify-around">

                    <div class="text-2xl font-bold">{{$list->field}}</div>

                    <div class="text-2xl font-bold">{{$list->amount}}</div>
                    <div class="card-actions ">

                            <button  onclick="edit_modal{{$list->id}}.showModal()" class="fa fa-edit mx-2"></button>
                            <x-modals.income-edit-form  :list='$list' />
                        <form method="POST" action="/incomes/{{$list->id}}">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="fa fa-xmark mx-2"></button>
                        </form>
                    </div>
                </div>
            @endforeach
            @else
                <div class="card bg-red-100 shadow-xl m-4 p-2 flex flex-row justify-around">
                    <div class="text-2xl font-bold">Income List Empty</div>
                </div>
            @endif
        </div>
        <div class="m-4 p-4 relative">
            <div class="fixed bottom-8">

                {{$incomeList->links()}}</div>
        </div>
    </div>
    @if (count($errors) > 0)
        <script type="text/javascript">
            console.log( document.getElementById('my_modal'));
            document.getElementById('my_modal').showModal();
        </script>
    @endif
</x-layout>
