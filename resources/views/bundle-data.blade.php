@foreach($bundle as $b)
    <div class="row mb-3">
        <div class="col d-flex justify-content-center align-items-center p-3 rounded-start" >
            <img src="{{ asset('asset/image 10.png') }}" alt="" srcset="" style="width:100%;">
        </div>
        <div class="col d-flex justify-content-start align-items-center p-3 rounded-end" style="font-weight:bold;">
            <span class="me-3">{{ $b->bundle_name }}</span>
            <form action="" method="post" id="bundleForm_{{ $b->bundle_id }}">
            @csrf
                @if($existsInBundleList)
                    <input type="hidden" name="publish_id" value="{{ $_GET['publishId'] }}" id="">
                    <input type="checkbox" name="bundle" value="{{ $b->bundle_id }}" style="width:30px; height:30px" id="bundle_checkbox_{{ $b->bundle_id }}" data-bundle-id="{{ $b->bundle_id }}" @foreach($getInBundleList as $bl) @if($bl->bundle_id == $b->bundle_id && $bl->MyBundle->user_id == Auth::id() && $bl->bundlelist_id == $bl->MyBundle->bundlelist_id) checked @endif @endforeach>
                    <input type="hidden" name="bundleListId" value="@foreach($getInBundleList as $bl) @if($bl->bundle_id == $b->bundle_id && $bl->MyBundle->user_id == Auth::id() && $bl->bundlelist_id == $bl->MyBundle->bundlelist_id) {{$bl->bundlelist_id}} @endif @endforeach" id="bundleListId_{{ $b->bundle_id }}">
                @else
                    <input type="hidden" name="publish_id" value="{{ $_GET['publishId'] }}" id="">
                    <input type="checkbox" name="bundle" value="{{ $b->bundle_id }}" style="width:30px; height:30px" id="bundle_checkbox_{{ $b->bundle_id }}" data-bundle-id="{{ $b->bundle_id }}">
                @endif
            </form>
        </div>
    </div>
@endforeach
<script>
    const checkboxes = document.querySelectorAll('input[type="checkbox"]');
    checkboxes.forEach((checkbox) => {
        checkbox.addEventListener('change', function() {
            const form = this.closest('form');
            
            if (this.checked) {
                form.setAttribute('action', '/addbundle');
            } else {
                form.setAttribute('action', '/deletebundle');
            }
            
            form.submit();
        });
    });
</script>