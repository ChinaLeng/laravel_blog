    <footer class="blue-bg main-footer no-margin">
<!--         <div class="container">
            <div class="footer-logo">Easy!</div>
        </div> -->
            <div class="container">
                <div class="row row-pb-md">
                    <div class="col-md-3">
                        <h3>聯係我</h3>
                        <p>
                            <ul class="colorlib-footer-links" style="color: #222">
                                <li>微信:{{config('kuan.wx')}}</li>
                                <li>QQ:{{config('kuan.qq')}}</li>
                                <li>Email:{{config('kuan.admin_email')}}</li>
                            </ul>
                        </p>
                    </div>
                    <div class="col-md-3">
                        <h3>歸檔</h3>
                        <p>
                            <ul class="colorlib-footer-links">
                                @foreach(\App\Models\Article::getFile() as $k => $v)
                                <li><a href="{{ route('index.file') }}#{{ $v['pub_date'] }}">{{ $v['pub_date'] }}年({{ $v['cou'] }})</a></li>
                                @endforeach
                            </ul>
                        </p>
                    </div>
                    <div class="col-md-3">
                        <h3>標簽</h3>
                        <p class="tags">
                            @foreach(\App\Models\Tag::all() as $k => $v)
                                <span><a href="{{ route('index.list',[$v->id]) }}"><i class="icon-tag"></i>{{ $v->name }}</a></span>
                            @endforeach
                        </p>
                    </div>
                </div>
            <div class="footer-bottom">
                <div class="container">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="copyright-area">
                                <p>联系邮箱:{{config('kuan.admin_email')}}</p>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="footer-right text-right">
                                <a href="http://www.beian.miit.gov.cn" target="_blank" style="display: inline-block;">
                                    <p>TCP 备案:{{config('kuan.tcp')}}</p>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            </div>
    </footer>