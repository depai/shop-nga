<select required class="form-control select2" id="" name="product[{{ $stt }}][type]" onchange="setProduct({{ $stt }})">
    <option value=""></option>
    @foreach($productSuppliers->sortBy('type_code') as $productSupplier)
        <option value="{{ $productSupplier->type }}">{{ $productSupplier->type->code }} (còn: {{ $productSupplier->totalImport - $productSupplier->totalExport }})</option>
    @endforeach
</select>
