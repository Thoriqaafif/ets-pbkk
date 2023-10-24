<section>
    <header>
        <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
            {{ __('Tambah Barang') }}
        </h2>
    </header>

    <form method="post" action="{{ route('product.new') }}" class="mt-6 space-y-6">
        @csrf

        <div>
            <x-input-label for="jenis" :value="__('Jenis')" />
            <select name="jenis" id="jenis">
                <option class="bg-gray-900 text-white" value="pakaian" selected="selected">
                    Pakaian
                </option>

                <option class="bg-gray-900 text-white" value="alat elektronik" selected="selected">
                    Alat Elektronik
                </option>

                <option class="bg-gray-900 text-white" value="gadget" selected="selected">
                    Gadget
                </option>

                <option class="bg-gray-900 text-white" value="alat Dapur" selected="selected">
                    Alat Dapur
                </option>
            </select>
        </div>

        <div>
            <x-input-label for="kondisi" :value="__('Kondisi')" />
            <select name="kondisi" id="kondisi">
                <option class="bg-gray-900 text-white" value="baik" selected="selected">
                    Baik
                </option>

                <option class="bg-gray-900 text-white" value="rusak" selected="selected">
                    Rusak
                </option>

                <option class="bg-gray-900 text-white" value="layak" seleted="selected">
                    Layak
                </option>
            </select>
        </div>
        
        <div>
            <x-input-label for="keterangan" :value="__('Keterangan')" />
            <x-text-input id="keterangan" name="keterangan" type="text" class="mt-1 block w-full" />
            <x-input-error :messages="$errors->get('keterangan')" class="mt-2" />
        </div>

        <div>
            <x-input-label for="kecacatan" :value="__('Kecacatan')" />
            <x-text-input id="kecacatan" name="kecacatan" type="text" class="mt-1 block w-full" />
            <x-input-error :messages="$errors->get('kecacatan')" class="mt-2" />
        </div>

        <div>
            <x-input-label for="jumlah" :value="__('Jumlah')" />
            <x-text-input id="jumlah" name="jumlah" type="text" class="mt-1 block w-full" />
            <x-input-error :messages="$errors->get('jumlah')" class="mt-2" />
        </div>

        <div>
            <x-input-label for="image" :value="__('Gambar')" />
            <input type="file" id="image" name="image" accept="image/*">
            @error('foto')
            <div class="error-msg">{{ $message }}</div>
            @enderror
        </div>

        <div class="flex items-center gap-4">
            <x-primary-button>{{ __('Save') }}</x-primary-button>

            @if (session('status') === 'password-updated')
                <p
                    x-data="{ show: true }"
                    x-show="show"
                    x-transition
                    x-init="setTimeout(() => show = false, 2000)"
                    class="text-sm text-gray-600 dark:text-gray-400"
                >{{ __('Saved.') }}</p>
            @endif
        </div>
    </form>
</section>
