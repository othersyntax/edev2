<x-guest-layout>
    <div class="mb-4 text-sm text-gray-600">
        {{ __('Selamat datang ke Sistem Pengurusan Peruntukan Pembangunan (eDE). Terima kasih kerana log-masuk ke sistem ini. Bagi memastikan penggunaan e-mel secara berintegriti, sila buat pengesahan e-mel anda dengan menekan butang "Sahkan E-mel Saya" di dalam e-mel yang telah dihantar kepada anda. Sekiranya anda tidak menerima sebarang e-mel seumpama ini, sila tekan butang "HANTAR SEMULA E-MEL VERIFIKASI".') }}
    </div>

    @if (session('status') == 'verification-link-sent')
        <div class="mb-4 font-medium text-sm text-green-600">
            {{ __('Capaian verifikasi e-mel telah dihantar ke e-mel rasmi yang telah didaftar.') }}
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
                {{ __('Log-Keluar') }}
            </button>
        </form>
    </div>
</x-guest-layout>
