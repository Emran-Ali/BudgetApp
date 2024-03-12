<x-layout>
    <div class="m-4">
        <button class="text-lg font-bold hover:text-laravel" onclick="my_modal.showModal()"><i class="fa-regular fa-square-plus pr-2"></i>Add Income</button>
        @if (count($errors) > 0)
            <script type="text/javascript">
                $( document ).ready(function() {
                    my_modal.modal('show');
                });
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
            class="border-2  rounded max-w-lg mx-auto mt-2"
        >
            <div class="overflow-x-auto">
                <table class="table table-zebra text-2xl font-bold">
                    <!-- head -->
                    <thead>
                    <tr class="text-3xl ">
                        <th>Field Name</th>
                        <th>Amount</th>

                    </tr>
                    </thead>
                    <tbody>
                    @foreach($incomeList as $list)
                        <tr>

                            <td>{{$list->field}}</td>
                            <td>{{$list->amount}}</td>

                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-layout>
