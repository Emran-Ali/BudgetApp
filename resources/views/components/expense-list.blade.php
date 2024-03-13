<x-layout>
    <div class="m-4">
        <nav class="flex justify-between items-center mb-4">
            <div class="text-xl font-bold">
                <i class="fa fa-list mx-4 "></i> List of Expense
            </div>
            <button class="text-lg font-bold hover:text-laravel" onclick="my_modal_3.showModal()"><i class="fa-solid fa-circle-minus pr-2"></i>Add Expense</button>
        </nav>

        <dialog id="my_modal_3" class="modal">
            <div class="modal-box">
                <form method="dialog">
                    <button class="btn btn-sm btn-circle btn-ghost absolute right-2 top-2">✕</button>
                </form>
                @include('components.cost-form')
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
                    @foreach($costList as $list)
                <div class="card bg-cyan-100 shadow-xl m-4 p-2 flex flex-row justify-around">
                    {{--                    <div class="card-body">--}}


                    <div class="text-2xl font-bold">{{$list->field}}</div>

                    <div class="text-2xl font-bold">{{$list->amount}}</div>
                    <div class="card-actions ">
                        <form action="" >
                            @csrf
                            <button type="submit" class="fa fa-edit mx-2"></button>
                        </form>
                        <form method="POST" action="/expenses/{{$list->id}}" >
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="fa fa-xmark mx-2"></button>
                        </form>
                    </div>
                </div>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <div class="m-4 p-4 ">{{$costList->links()}}</div>
    </div>
</x-layout>
