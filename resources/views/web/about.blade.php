
@extends('layouts.main')

@section('title', 'Sobre Nós')

@section('content')
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
    <header class="bg-green py-20 text-white text-center">
        <div class="container mx-auto">
        <h1 class="text-4xl font-semibold mb-4">Bem Vindo</h1>
            <p class="text-lg text-secondary">Experiências únicas e Inesquecíveis.</p>
        </div>
    </header>

    <section class="py-16">
        <div class="container mx-auto">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-16">
                <div class="space-y-4">
                    <h2 class="text-2xl font-semibold text-secondary">Nossa História</h2>
                    <p class="text-gray-300">Sempre com muita responsabilidade e comprometimento com nossos clientes, sempre buscamos oferecer o que há de melhor à todos, para que tenham uma ótima experiência.</p>
                </div>
                <div class="space-y-4">
                    <h2 class="text-2xl font-semibold text-secondary">Nossa Missão</h2>
                    <p class="text-gray-300">Nossa missão é oferecer a melhor experiência para todos os hóspedes e fazer com que ao fim da estadia estejam satisfeitos e tenham vontade de retornar.</p>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection
