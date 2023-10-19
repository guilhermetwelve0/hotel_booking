<x-app-layout>
    <x-slot name="header">
        <h2 class="text-2xl font-semibold text-primary leading-tight">
            Informações de Contato <i class="fa-solid fa-gear pl-3 text-primary"></i>
        </h2>
    </x-slot>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-7">
        <div class="overflow-x-auto bg-white rounded-lg shadow-md">
            <table class="w-full">
                <thead>
                    <tr>
                        <th class="px-6 py-3 bg-gray-100 text-left text-sm font-semibold text-gray-700">
                            Telefone
                        </th>
                        <th class="px-6 py-3 bg-gray-100 text-left text-sm font-semibold text-gray-700">
                            Nome
                        </th>
                        <th class="px-6 py-3 bg-gray-100 text-left text-sm font-semibold text-gray-700">
                            Email
                        </th>
                        <th class="px-6 py-3 bg-gray-100 text-left text-sm font-semibold text-gray-700">
                            Mensagem
                        </th>
                        <th class="px-6 py-3 bg-gray-100 text-left text-sm font-semibold text-gray-700">
                            Ações
                        </th>
                        <!-- Adicione mais colunas aqui, se necessário -->
                    </tr>
                </thead>
                <tbody>
                    @foreach ($contacts as $item)
                        <tr>
                            <td class="px-6 py-4 whitespace-no-wrap text-sm font-medium text-gray-900">
                                {{ $item['phone'] }}
                            </td>
                            <td class="px-6 py-4 whitespace-no-wrap text-sm text-gray-600">
                                {{ $item['name'] }}
                            </td>
                            <td class="px-6 py-4 whitespace-no-wrap text-sm text-gray-600">
                                {{ $item['email'] }}
                            </td>
                            <td class="px-6 py-4 whitespace-no-wrap text-sm text-gray-600">
                                {{ $item['message'] }}
                            </td>
                            <td class="px-6 py-4 whitespace-no-wrap text-sm text-gray-600 flex justify-between">
                                <button type="button" onclick="openDeleteModal({{ $item['id'] }})" class="text-red-600 hover:text-red-900">
                                    <i class="fas fa-trash"></i>
                                </button>
                                <form id="delete-form-{{ $item['id'] }}" action="{{ route('contato.contato.destroy', $item['id']) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                </form>
                            </td>
                            <!-- Adicione mais colunas aqui, se necessário -->
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    
    <div id="delete-modal" class="fixed z-10 inset-0 overflow-y-auto flex items-center justify-center hidden" aria-labelledby="modal-title" role="dialog" aria-modal="true">
    <div class="bg-white rounded-lg max-w-md w-full p-4 shadow-xl transform sm:p-6">
        <div>
            <h3 class="text-lg leading-6 font-medium text-gray-900" id="modal-title">
                Confirmar Exclusão
            </h3>
            <div class="mt-2">
                <p class="text-sm text-gray-500">
                    Tem certeza que deseja excluir este contato?
                </p>
            </div>
        </div>
        <div class="mt-5 sm:mt-6">
            <button type="button" id="confirm-delete-button" class="inline-flex justify-center w-full rounded-md border border-transparent shadow-sm px-4 py-2 bg-red-600 text-base font-medium text-white hover:bg-red-700 focus:outline-none sm:text-sm">
                Deletar
            </button>
            <button type="button" id="close-modal-button" class="mt-3 inline-flex justify-center w-full rounded-md border border-gray-300 shadow-sm px-4 py-2 bg-white text-base font-medium text-gray-700 hover:bg-gray-50 focus:outline-none sm:text-sm">
                Fechar
            </button>
        </div>
    </div>
</div>

<script>
    let deleteForm;

    function openDeleteModal(id) {
        deleteForm = document.getElementById('delete-form-' + id);
        const modal = document.getElementById('delete-modal');
        modal.classList.remove('hidden');
        modal.classList.add('fixed');
    }

    document.getElementById('confirm-delete-button').addEventListener('click', function() {
        deleteForm.submit();
    });

    document.getElementById('close-modal-button').addEventListener('click', function() {
        const modal = document.getElementById('delete-modal');
        modal.classList.add('hidden');
        modal.classList.remove('fixed');
    });
</script>


</x-app-layout>
