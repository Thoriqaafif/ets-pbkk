<section>
    <header>
        <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
            {{ __('Update Barang') }}
        </h2>
    </header>

    <form method="put" action="{{ route('product.update', ['id' => $product->id]) }}" class="mt-6 space-y-6">
        @csrf
        @method('patch')

        <div>
            <x-input-label for="jenis" :value="__('Jenis')" />
            <select name="jenis" id="jenis">
                @if ($product->jenis=="pakaian")
                <option class="bg-gray-900 text-white" value="pakaian" selected="selected">
                    Pakaian
                </option>
                @else
                <option class="bg-gray-900 text-white" value="pakaian">
                    Pakaian
                </option>
                @endif

                @if ($product->jenis=="alat elektronik")
                <option class="bg-gray-900 text-white" value="alat elektronik" selected="selected">
                    Alat Elektronik
                </option>
                @else
                <option class="bg-gray-900 text-white" value="alat elektronik">
                    Alat Elektronik
                </option>
                @endif

                @if ($product->jenis=="gadget")
                <option class="bg-gray-900 text-white" value="gadget" selected="selected">
                    Gadget
                </option>
                @else
                <option class="bg-gray-900 text-white" value="gadget">
                    Gadget
                </option>
                @endif

                @if ($product->jenis=="alat dapur")
                <option class="bg-gray-900 text-white" value="alat Dapur" selected="selected">
                    Alat Dapur
                </option>
                @else
                <option class="bg-gray-900 text-white" value="alat Dapur" selected="selected">
                    Alat Dapur
                </option>
                @endif
            </select>
        </div>

        <div>
            <x-input-label for="kondisi" :value="__('Kondisi')" />
            <select name="kondisi" id="kondisi">
                @if ($product->kondisi=="baik")
                <option class="bg-gray-900 text-white" value="baik" selected="selected">
                    Baik
                </option>
                @else
                <option class="bg-gray-900 text-white" value="baik">
                    Baik
                </option>
                @endif

                @if ($product->kondisi=="rusak")
                <option class="bg-gray-900 text-white" value="rusak" selected="selected">
                    Rusak
                </option>
                @else
                <option class="bg-gray-900 text-white" value="rusak">
                    Rusak
                </option>
                @endif

                @if ($product->kondisi=="layak")
                <option class="bg-gray-900 text-white" value="layak" seleted="selected">
                    Layak
                </option>
                @else
                <option class="bg-gray-900 text-white" value="layak">
                    Layak
                </option>
                @endif
            </select>
        </div>
        
        <div>
            <x-input-label for="keterangan" :value="__('Keterangan')" />
            <x-text-input id="keterangan" name="keterangan" type="text" class="mt-1 block w-full" :value="old('keterangan', $product->keterangan)" />
            <x-input-error :messages="$errors->get('keterangan')" class="mt-2" />
        </div>

        <div>
            <x-input-label for="kecacatan" :value="__('Kecacatan')" />
            <x-text-input id="kecacatan" name="kecacatan" type="text" class="mt-1 block w-full" :value="old('kecacatan', $product->kecacatan)" />
            <x-input-error :messages="$errors->get('kecacatan')" class="mt-2" />
        </div>

        <div>
            <x-input-label for="jumlah" :value="__('Jumlah')" />
            <x-text-input id="jumlah" name="jumlah" type="text" class="mt-1 block w-full" :value="old('jumlah', $product->jumlah)" />
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
