@extends('layouts.main')

@section('title', 'About Us')

<style>
    .modal {
        display: none;
        position: fixed;
        top: 50%;
        /* Centralizar verticalmente */
        left: 50%;
        /* Centralizar horizontalmente */
        transform: translate(-50%, -50%);
        /* Centralizar completamente */
        width: 80%;
        /* Aumentar a largura */
        height: 80%;
        /* Aumentar a altura */
        justify-content: center;
        align-items: center;
        z-index: 1;
    }

    .modal-overlay {
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background-color: rgba(0, 0, 0, 0);
    }

    .modal-content {
        background-color: white;
        padding: 20px;
        border-radius: 5px;
        max-width: 100%;
        /* Largura máxima para preencher completamente o modal */
        max-height: 100%;
        /* Altura máxima para preencher completamente o modal */
        position: relative;
        text-align: center;
    }

    .modal-close {
        position: absolute;
        top: 10px;
        right: 10px;
        cursor: pointer;
        font-size: 1.5rem;
        color: #333;
    }

    .modal-header {
        padding-bottom: 10px;
        border-bottom: 1px solid #ccc;
    }

    .modal-body {
        padding: 20px;
        overflow-y: auto;
        /* Adicionar uma barra de rolagem vertical se o conteúdo for muito longo */
    }
</style>

<style>
    .gallery-horizontal {
        display: flex;
        overflow-x: auto;
        scrollbar-width: none; /* Para ocultar a barra de rolagem em navegadores compatíveis */
        -ms-overflow-style: none; /* Para ocultar a barra de rolagem no Internet Explorer */
    }

    .gallery-horizontal::-webkit-scrollbar {
        display: none; /* Para ocultar a barra de rolagem no Chrome, Safari, e Edge */
    }

    .gallery-horizontal img {
        width: auto;
        height: 200px;
        margin-right: 10px; /* Espaçamento entre as imagens */
    }
</style>



@section('content')
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <header class="bg-gradient-to-b from-primary to-[#0001] py-20 text-white text-center mb-8 rounded-lg shadow-lg">
            <div class="container mx-auto">
                <h1 class="text-4xl font-semibold mb-4">Meu Blog de Tecnologia</h1>
                <p class="text-lg text-secondary">Explorando o mundo da tecnologia.</p>
            </div>
        </header>

        <section class="py-16">
            <div class="container mx-auto">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-16">
                    <div class="space-y-4">
                        <h2 class="text-2xl font-semibold text-blue-600">Nossa Visão</h2>
                        <p class="text-gray-400">Nossa visão transcende o presente, pois estamos empenhados em moldar um
                            amanhã repleto de possibilidades tecnológicas, compartilhando conhecimento e inspirando outros a
                            fazerem o mesmo. Queremos ser uma fonte confiável de informações e insights no mundo em
                            constante evolução da tecnologia.</p>
                    </div>
                    <div class="space-y-4">
                        <h2 class="text-2xl font-semibold text-blue-600">Podemos te ajudar?</h2>
                        <p class="text-gray-400">No Meu Blog de Tecnologia, nossa missão é fornecer uma experiência
                            memorável e excepcional a cada leitor. Nos esforçamos para criar uma atmosfera de aprendizado e
                            descoberta, garantindo que sua jornada seja nada menos que extraordinária.</p>
                    </div>
                </div>
            </div>
        </section>

        <!-- Adicione os posts do blog aqui -->
        <section class="py-12">
            <div class="container mx-auto">
                <h2 class="text-3xl font-semibold text-blue-600 mb-6">Últimos Posts</h2>
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                    <?php
                    // Array de dados dos posts
                    $posts = [
                        [
                            'imagem' => 'https://picsum.photos/300/600?text=Imagem+do Primeiro+Post',
                            'titulo' => 'Viagem Segura',
                            'descricao' => 'Descrição do primeiro post. Aqui você pode escrever um resumo breve sobre o conteúdo do post.',
                            'conteudo' => '<p>Este é o conteúdo completo do primeiro post. Neste post, exploraremos um tópico interessante e relevante para a nossa comunidade. 🌍 Discutiremos os principais aspectos desse assunto, analisaremos dados relevantes e compartilharemos insights valiosos. 💡</p>
<p>Ao longo deste post, você encontrará informações detalhadas, exemplos práticos e dicas úteis. 📚 Nosso objetivo é fornecer a você um recurso informativo e envolvente que o ajude a entender melhor o assunto em questão. 🧐</p>
<p>Além disso, estaremos abertos a perguntas e comentários dos nossos leitores. Queremos ouvir sua opinião e responder às suas dúvidas. Acreditamos que a discussão e o compartilhamento de conhecimento enriquecem a experiência de todos. 🗣️</p>
<p>Portanto, aproveite a leitura deste post e não hesite em participar da conversa. Estamos ansiosos para interagir com você e compartilhar informações valiosas. 📢</p>
<div class="gallery-horizontal">
    <img src="https://media.giphy.com/media/xT0xeJpnrWC4XWblEk/giphy.gif" alt="Imagem Exemplo 1">
    <img src="https://media.giphy.com/media/Zau0yrl17uzdK/giphy.gif" alt="Descrição da Segunda Imagem">
    <img src="https://media.giphy.com/media/X8RSwd1089xDvOjQnT/giphy.gif" alt="Descrição da Terceira Imagem">
    <!-- Adicione mais imagens conforme necessário -->
</div>'
                        ],
                        [
                            'imagem' => 'https://picsum.photos/300/600?text=Imagem+do+Segundo+Post',
                            'titulo' => 'Título do Segundo Post',
                            'descricao' => 'Descrição do segundo post. Novamente, forneça um resumo do conteúdo do post aqui.',
                            'conteudo' => 'Conteúdo completo do segundo post. Este é outro exemplo de conteúdo de post que pode ser exibido em um modal.',
                        ],
                        [
                            'imagem' => 'https://picsum.photos/300/600?text=Imagem+do+Terceiro+Post',
                            'titulo' => 'Título do Terceiro Post',
                            'descricao' => 'Descrição do terceiro post. Aqui você pode escrever um resumo breve sobre o conteúdo do post.',
                            'conteudo' => 'Conteúdo completo do terceiro post. Este é mais um exemplo de conteúdo de post que pode ser exibido em um modal.',
                        ],
                        [
                            'imagem' => 'https://picsum.photos/300/600?text=Imagem+do+Quarto+Post',
                            'titulo' => 'Título do Quarto Post',
                            'descricao' => 'Descrição do quarto post. Novamente, forneça um resumo do conteúdo do post aqui.',
                            'conteudo' => 'Conteúdo completo do quarto post. Este é mais um exemplo de conteúdo de post que pode ser exibido em um modal.',
                        ],
                        // Adicione mais posts aqui conforme necessário
                    ];
                    
                    // Função para criar um card de post
                    function criarCardPost($post, $indice)
                    {
                        echo '
                        <div class="bg-white rounded-lg shadow-md overflow-hidden">
                            <img src="' .
                            $post['imagem'] .
                            '" alt="' .
                            $post['titulo'] .
                            '" class="w-full h-40 object-cover">
                            <div class="p-4">
                                <h3 class="text-xl font-semibold text-blue-600">' .
                            $post['titulo'] .
                            '</h3>
                                <p class="text-gray-700">' .
                            $post['descricao'] .
                            '</p>
                                <a href="#" class="text-blue-600 hover:underline" onclick="abrirModal(' .
                            $indice .
                            ')">Leia Mais</a>
                            </div>
                        </div>';
                    }
                    
                    // Exibir os cards dos posts
                    foreach ($posts as $indice => $post) {
                        criarCardPost($post, $indice);
                    }
                    ?>


                    <!-- Modal -->
                    <div id="modal" class="modal">
                        <div class="modal-overlay" onclick="fecharModal()"></div>
                        <div class="modal-content">
                            <span class="modal-close" onclick="fecharModal()">&times;</span>
                            <div class="modal-header">
                                <h2 id="modal-titulo" class="text-2xl font-semibold text-blue-600 mb-4"></h2>
                            </div>
                            <div class="modal-body">
                                <p id="modal-conteudo" class="text-gray-700"></p>
                            </div>
                        </div>
                    </div>



                    <script>
                        function abrirModal(indice) {
                            const post = <?php echo json_encode($posts); ?>;
                            document.getElementById("modal-titulo").textContent = post[indice].titulo;
                            document.getElementById("modal-conteudo").innerHTML = post[indice]
                            .conteudo; // Use innerHTML para processar o conteúdo como HTML
                            document.getElementById("modal").style.display = "block";
                        }


                        function fecharModal() {
                            document.getElementById("modal").style.display = "none";
                        }
                    </script>

                </div>
            </div>
        </section>

    </div>
@endsection
