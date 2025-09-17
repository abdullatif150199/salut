<section id="faq" style="background: transparent; color: #fff; padding: 4rem 0; margin-top:5rem;">
    <div class="container text-center mb-5">
        <h2 class="gradient-text" >Frequently Asked Questions (FAQ)</h2>
        <p class="head" style="color:#d1d1d1; max-width:700px; margin:0 auto;">Berikut adalah pertanyaan yang sering diajukan mengenai kegiatan dan layanan aplikasi Salut.</p>
    </div>

    <div class="container">
        @foreach($faqs as $index => $faq)
            <div style="margin-bottom: 1rem; border-radius:15px; box-shadow:0 8px 20px rgba(0,0,0,0.3); overflow:hidden;">
                <!-- Pertanyaan -->
                <div onclick="toggleAnswer({{ $index }})"
                     style="cursor:pointer; padding:1rem 1.5rem; background-color: rgba(255,255,255,0.05); color:#fff; font-weight:500; border-bottom:1px solid rgba(0,184,148,0.3);">
                    {{ $faq->question }}
                </div>

                <!-- Jawaban -->
                <div id="answer{{ $index }}" style="max-height: 0; overflow: hidden; transition: max-height 0.4s ease, padding 0.4s ease; padding:0 1.5rem; background-color: rgba(255,255,255,0.05); color:#e0e0e0; border-left:3px solid #00b894;">
                    <div style="padding:1rem 0;">
                        {!! $faq->answer !!}
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</section>

<script>
function toggleAnswer(index) {
    const el = document.getElementById('answer' + index);
    if (el.style.maxHeight && el.style.maxHeight !== "0px") {
        // collapse
        el.style.maxHeight = "0";
        el.style.paddingTop = "0";
        el.style.paddingBottom = "0";
    } else {
        // expand
        el.style.maxHeight = el.scrollHeight + "px";
        el.style.paddingTop = "2px";
        el.style.paddingBottom = "2px";
    }
}
</script>
