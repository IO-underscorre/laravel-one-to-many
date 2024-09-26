@php
    $is_update_form = isset($item_to_update) ? true : false;
@endphp


<form action="{{ $action }}" method="POST" class="row g-2">
    @csrf

    @if ($is_update_form)
        @method('PUT')
    @endif

    <div class="col-12">
        <div class="position-relative pb-4">
            <label for="input-title" class="form-label text-primary">
                Title
            </label>

            <input type="text" class="form-control @error('title') is-invalid @enderror" id="input-title" name="title"
                aria-errormessage="input-title-error" value="{!! old('title', $is_update_form ? $item_to_update->title : '') !!}" minlength="3" maxlength="150"
                placeholder="Title..." required>

            @error('title')
                <small id="input-title-error" class="invalid-feedback position-absolute bottom-0 start-0">
                    {{ $message }}
                </small>
            @enderror
        </div>
    </div>

    @if ($is_update_form)
        <div class="col-12">
            <div class="position-relative pb-4">
                <label for="input-archived-status" class="form-label text-primary">
                    Status
                </label>

                <select class="form-control @error('is_archived') is-invalid @enderror" id="input-archived-status"
                    name="is_archived" aria-errormessage="input-archived-status-error" required>
                    <option value="0" @selected(!old('is_archived', $is_update_form ? boolval($item_to_update->is_archived) : false))>Not archived</option>

                    <option value="1" @selected(old('is_archived', $is_update_form ? boolval($item_to_update->is_archived) : false))>Archived</option>
                </select>
                @error('is_archived')
                    <small id="input-archived-status-error" class="invalid-feedback position-absolute bottom-0 start-0">
                        {{ $message }}
                    </small>
                @enderror
            </div>
        </div>
    @endif

    <div class="col-12">
        <div class="position-relative pb-4">
            <label for="input-body" class="form-label text-primary">
                Body
            </label>

            <textarea type="text" class="form-control @error('body') is-invalid @enderror" id="input-body" name="body"
                aria-errormessage="input-body-error" rows="6" minlength="3" maxlength="65535" placeholder="Body..." required>{!! old('body', $is_update_form ? $item_to_update->body : '') !!}</textarea>

            @error('body')
                <small id="input-body-error" class="invalid-feedback position-absolute bottom-0 start-0">
                    {{ $message }}
                </small>
            @enderror
        </div>
    </div>

    <div class="col-12">
        <button class="btn btn-primary" type="submit"><i class="fa-solid fa-paper-plane"></i></button>
    </div>
</form>
