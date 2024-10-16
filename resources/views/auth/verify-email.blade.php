<x-guest-layout>
    <div class="mb-4 text-sm text-gray-600">
        {{ __('Selamat datang ke Sistem Pengurusan Peruntukan Pembangunan (eDE). Terima kasih kerana Log-masuk ke sistem ini. Bagi memastikan e-mel yang digunakan adalah berintegiriti, sila sahkan e-mel anda dengan menekan butang Sahkan atau capaian yang telah dihantar ke e-mel sebelum ini. Jika anda tidak menerima e-mel seumpama ini, kami akan menghantar capaian yang lain.') }}
    </div>

    @if (session('status') == 'verification-link-sent')
        <div class="mb-4 font-medium text-sm text-green-600">
            {{ __('Capaian verikasi e-mel akan dihantar ke e-mel rasmi yang telah didaftar.') }}
        </div>
    @endif

    <div class="mt-4 flex items-center justify-between">
        <form method="POST" action="{{ route('verification.send') }}">
            @csrf

            <div>
                <x-primary-button>
                    {{ __('Hantar semula e-mel verifikasi') }}
                </x-primary-button>
            </div>
        </form>

        <form method="POST" action="{{ route('logout') }}">
            @csrf

            <button type="submit" class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                {{ __('Log Out') }}
            </button>
        </form>
    </div>
</x-guest-layout>
