<div class="container">
    <div class="footer-artwork" id="footer-artwork"></div>
</div>

@php
$setting = App\Models\setting::find(1);
@endphp
<div class="container">
    <footer class="footer-area">
        <div class="footer-left">
            <p>
                <span face="Kalpurush, Arial, sans-serif">{{isset($setting->name) ? $setting->name : ''}}</span><br>
            </p>
            <p><span style="font-size: 1rem;">{{isset($setting->address) ? $setting->address : ''}}</span></p>
        </div>
        <div class="footer-right">
            <p>Developed By</p>
            <a href="{{ route('developers') }}">Enrich IT Solutions</a>
        </div>
    </footer>
</div>