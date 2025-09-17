<section id="faq" style="background: transparent; color: #fff; padding: 4rem 0; margin-top:5rem;">
    <div class="container text-center mb-5">
        <h2 class="gradient-text">Frequently Asked Questions (FAQ)</h2>
        <p class="head" style="color:#d1d1d1; max-width:700px; margin:0 auto;">
            Berikut adalah pertanyaan yang sering diajukan mengenai kegiatan dan layanan aplikasi Salut.
        </p>
    </div>

    <div class="container">
        @foreach ($faqs as $index => $faq)
            <div style="margin-bottom: 1rem; border-radius:15px; box-shadow:0 8px 20px rgba(0,0,0,0.3); overflow:hidden;">
                <!-- Pertanyaan -->
                <div onclick="toggleAnswer({{ $index }})"
                     style="cursor:pointer; padding:1rem 1.5rem; background-color: rgba(255,255,255,0.05); color:#fff; font-weight:500; border-bottom:1px solid rgba(0,184,148,0.3); display:flex; justify-content:space-between; align-items:center;">
                    <span>{{ $faq->question }}</span>
                    <!-- Panah -->
                    <span id="arrow{{ $index }}" style="transition: transform 0.3s ease; font-size:1.7rem;">⏷</span>
                </div>

                <!-- Jawaban -->
                <div id="answer{{ $index }}"
                     style="max-height: 0; overflow: hidden; transition: max-height 0.4s ease, padding 0.4s ease; padding:0 1.5rem; background-color: rgba(255,255,255,0.05); color:#e0e0e0; border-left:3px solid #00b894;">
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
        let answer = document.getElementById('answer' + index);
        let arrow = document.getElementById('arrow' + index);

        if (answer.style.maxHeight === "0px" || answer.style.maxHeight === "") {
            // expand
            answer.style.maxHeight = answer.scrollHeight + "px";
            answer.style.paddingTop = "1rem";
            answer.style.paddingBottom = "1rem";
            arrow.style.transform = "rotate(180deg)";
        } else {
            // collapse
            answer.style.maxHeight = "0px";
            answer.style.paddingTop = "0";
            answer.style.paddingBottom = "0";
            arrow.style.transform = "rotate(0deg)";
        }
    }
</script>
