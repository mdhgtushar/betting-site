<?php include"inc/header.php"?>






<style>
.marquee{
color: #000;
background: #eee;
border-left: 2px solid #000;
border-right: 2px solid #000;
font-size: 15px;
border-bottom: 1px solid #0000;
padding:5px;
}
</style>



        <section id="main-content">
        <br>
            <div class="live-match">
               
<section class="main-section">
<div class="marquee">
<marquee>
<p><strong>Wellcome to our site</strong></p>
</marquee>
</div>
</section>

        <section class="menu" id="menu">
            <div class="menu-button">
                <button id="prev" onclick="prev()"> < </button>
            </div> 
           
            <div class="menu-boxes" id="boxes">

            <div class="menu-box">
                <div class="menu-box-img"><img src="https://alldemo.site/demo-20/img/Star.png" alt=""></div>
                <div class="menu-box-title"><a href="">All Games</a></div>
            </div>
            <div class="menu-box">
                <div class="menu-box-img"><img src="https://alldemo.site/demo-20/images/Football_Image1.png" alt=""></div>
                <div class="menu-box-title"><a href="">Football <span class="col-dng">(0)</span></a></div>
            </div>
            <div class="menu-box">
                <div class="menu-box-img"><img src="https://alldemo.site/demo-20/images/Cricket_Image1.png" alt=""></div>
                <div class="menu-box-title"><a href="">Cricket <span class="col-dng">(0)</span></a></div>
            </div>
            <div class="menu-box">
                <div class="menu-box-img"><img src="https://alldemo.site/demo-20/images/tennis.png" alt=""></div>
                <div class="menu-box-title"><a href="">Tennis <span class="col-dng">(0)</span></a></div>
            </div>
            <div class="menu-box">
                <div class="menu-box-img"><img src="https://alldemo.site/demo-20/images/badminton.png" alt=""></div>
                <div class="menu-box-title"><a href="">Badminton <span class="col-dng">(0)</span></a></div>
            </div>
            <div class="menu-box">
                <div class="menu-box-img"><img src="https://alldemo.site/demo-20/images/virtual.png" alt=""></div>
                <div class="menu-box-title"><a href="">Virtual <span class="col-dng">(0)</span></a></div>
            </div>
            <div class="menu-box">
                <div class="menu-box-img"><img src="https://alldemo.site/demo-20/images/hockey.png" alt=""></div>
                <div class="menu-box-title"><a href="">Hockey <span class="col-dng">(0)</span></a></div>
            </div>
            <div class="menu-box">
                <div class="menu-box-img"><img src="https://alldemo.site/demo-20/images/Table_Tennis.png" alt=""></div>
                <div class="menu-box-title"><a href="">Table Tennis <span class="col-dng">(0)</span></a></div>
            </div>
            <div class="menu-box">
                <div class="menu-box-img"><img src="https://alldemo.site/demo-20/images/Besball.png" alt=""></div>
                <div class="menu-box-title"><a href="">Besball <span class="col-dng">(0)</span></a></div>
            </div>
            <div class="menu-box">
                <div class="menu-box-img"><img src="https://alldemo.site/demo-20/images/Boxing.png" alt=""></div>
                <div class="menu-box-title"><a href="">Boxing <span class="col-dng">(0)</span></a></div>
            </div>
            <div class="menu-box">
                <div class="menu-box-img"><img src="https://alldemo.site/demo-20/images/Voliball.png" alt=""></div>
                <div class="menu-box-title"><a href="">Voliball <span class="col-dng">(0)</span></a></div>
            </div>
            </div>
            <div class="menu-button" style="right: 0;">
                <button onclick="next()"> > </button>
            </div>
        </section>
        <br/>
                <ul>
                    <li><h3 class="match-header" onclick="allMatchesShow()"><span>Live Matches</span> <p><i class="fa fa-arrow-down" aria-hidden="true"></i></p></h3></li>
                    <ul class="match-ul display" id="allMatches">
                        <li class="match-li"><span> Tokyo Verdy VS Fagiano Okayama , Japan Emperor Cup || 16 Jun , 03:00 am</span>
                             <ul>
                            <li>
                                <div class="match-statistic">
                                    <p><strong>win the match</strong></p>
                                    <div class="match-statistic-result">
                                        <table>
                                            <tr>
                                                <td><a href="#">Fagiano Okayama 2.3</a></td>
                                                <td><a href="#">Tokyo Verdy  2.3</a></td>
                                                <td><a href="#">Drow 2.3</a></td>
                                            </tr>
                                        </table>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="match-statistic">
                                    <p><strong>win the match</strong></p>
                                    <div class="match-statistic-result">
                                        <a href="#">Fagiano Okayama 2.3</a>
                                        <a href="#">Tokyo Verdy  2.3</a>
                                        <a href="#">Drow 2.3</a>
                                    </div>
                                </div>
                            </li>
                        </ul>
                        </li>
                    </ul>
                    <br>
                    <li><h3 class="match-header" onclick="allMatchesShow2()"><span>Upcomming Matches</span> <p><i class="fa fa-arrow-down" aria-hidden="true"></i></p></h3></li>
                    <ul class="match-ul display" id="allMatches2">
                        <li class="match-li"><span> Tokyo Verdy VS Fagiano Okayama , Japan Emperor Cup || 16 Jun , 03:00 am</span>
                             <ul>
                            <li>
                                <div class="match-statistic">
                                    <p><strong>win the match</strong></p>
                                    <div class="match-statistic-result">
                                        <a href="#">Fagiano Okayama 2.3</a>
                                        <a href="#">Tokyo Verdy  2.3</a>
                                        <a href="#">Drow 2.3</a>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="match-statistic">
                                    <p><strong>win the match</strong></p>
                                    <div class="match-statistic-result">
                                        <a href="#">Fagiano Okayama 2.3</a>
                                        <a href="#">Tokyo Verdy  2.3</a>
                                        <a href="#">Drow 2.3</a>
                                    </div>
                                </div>
                            </li>
                        </ul>
                        </li>
                    </ul>
                </ul>
            </div>
        </section> <br>
       <?php include"inc/footer.php";?>