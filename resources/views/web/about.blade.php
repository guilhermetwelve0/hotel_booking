@extends('layouts.main')

@section('title', 'Sobre Nós')

@section('content')
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <header class="bg-green-900 py-20 text-white text-center">
            <div class="container mx-auto">
                <h1 class="text-4xl font-semibold mb-4">Bem Vindo ao Nosso Mundo</h1>
                <p class="text-lg text-secondary">Descubra a magia por trás de nossa hospitalidade.</p>
            </div>
        </header>

        <section class="py-16">
            <div class="container mx-auto">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-16">
                    <div class="space-y-4">
                        <h2 class="text-2xl font-semibold text-secondary">Nossa História</h2>
                        <p class="text-gray-300">
                            Há mais de uma década, nossa jornada começou com um compromisso apaixonado com a hospitalidade.
                            Desde então, temos o orgulho de criar experiências únicas e inesquecíveis para nossos hóspedes.
                        </p>
                    </div>
                    <div class="space-y-4">
                        <h2 class="text-2xl font-semibold text-secondary">Nossa Missão</h2>
                        <p class="text-gray-300">
                            Nossa missão é simples: superar as expectativas de nossos hóspedes. Queremos que cada estadia
                            seja repleta de momentos memoráveis e sorrisos. Estamos dedicados a fazer com que nossos
                            hóspedes se sintam em casa.
                        </p>
                    </div>
                </div>
            </div>
        </section>

        

        <!-- Galeria de Imagens -->
        <section class="py-16">
            <div class="container mx-auto">
                <h2 class="text-3xl font-semibold text-center text-secondary mb-8">Nossas Instalações</h2>
                <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                    <!-- Adicione imagens da galeria aqui -->
                    <div class="bg-cover bg-center h-96 rounded-lg"
                        style="background-image: url('{{ asset('img/temp/classic.jpg') }}');"></div>
                    <div class="bg-cover bg-center h-96 rounded-lg"
                        style="background-image: url('{{ asset('img/temp/double.png') }}');"></div>
                    <div class="bg-cover bg-center h-96 rounded-lg"
                        style="background-image: url('{{ asset('img/temp/superior.jpg') }}');"></div>
                </div>
            </div>
        </section>

        <!-- Depoimentos de Clientes -->
        <section class="py-16 bg-gradient-to-r from-purple-400 via-green-500 to-red-500">
            <div class="container mx-auto">
                <h2 class="text-3xl font-semibold text-center text-white mb-8">Depoimentos de Clientes</h2>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                    <!-- Depoimentos de clientes -->
                    <div class="bg-white p-6 rounded-lg shadow-lg hover:scale-105 transform transition-transform">
                        <p class="text-gray-600">"Excelente serviço e equipe simpática. Tive uma estadia maravilhosa!"</p>
                        <p class="text-gray-400 mt-2">- Maria Silva</p>
                    </div>
                    <div class="bg-white p-6 rounded-lg shadow-lg hover:scale-105 transform transition-transform">
                        <p class="text-gray-600">"Este hotel é incrível. A comida é deliciosa e as vistas são
                            deslumbrantes!"</p>
                        <p class="text-gray-400 mt-2">- João Santos</p>
                    </div>
                    <div class="bg-white p-6 rounded-lg shadow-lg hover:scale-105 transform transition-transform">
                        <p class="text-gray-600">"Ótima localização, serviço impecável e instalações modernas. Recomendo!"
                        </p>
                        <p class="text-gray-400 mt-2">- Ana Oliveira</p>
                    </div>
                    <div class="bg-white p-6 rounded-lg shadow-lg hover:scale-105 transform transition-transform">
                        <p class="text-gray-600">"O atendimento foi excepcional. Me senti em casa!"</p>
                        <p class="text-gray-400 mt-2">- Pedro Costa</p>
                    </div>
                </div>
            </div>
        </section>


    </div>
@endsection
