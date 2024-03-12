<x-layout>
    <div class="m-4">
        <button class="text-lg font-bold hover:text-laravel" onclick="my_modal_3.showModal()"><i class="fa-solid fa-hand-holding-dollar pr-2"></i>Add Expense</button>
        <dialog id="my_modal_3" class="modal">
            <div class="modal-box">
                <form method="dialog">
                    <button class="btn btn-sm btn-circle btn-ghost absolute right-2 top-2">✕</button>
                </form>
                @include('components.cost-form')
            </div>
        </dialog>
        <div
            class="border-2  rounded max-w-lg mx-auto mt-2"
        >
            {{--            //modal--}}
            <!-- You can open the modal using ID.showModal() method -->

            {{--            end modal--}}
            <div class="overflow-x-auto">
                <table class="table table-zebra text-2xl">
                    <!-- head -->
                    <thead>
                    <tr class="text-3xl ">
                        <th>Field Name</th>
                        <th>Amount</th>
                        <th>Date</th>

                    </tr>
                    </thead>
                    <tbody>
                    @foreach($costList as $list)
                        <tr>
                            <td>{{$list->field}}</td>
                            <td>{{$list->amount}}</td>
                            <td>{{date_format($list->created_at,"Y/m/d")}}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-layout>
