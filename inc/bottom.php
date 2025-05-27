<style>
  /* 하단 바텀바 서식 */
  #bottom {
    position: fixed;
    bottom: 0;
    width: 100%;
    background: #fff;
    border-top: 1px solid #ccc;
    z-index: 100;
  }
  #bottom ul {
    display: flex;
    justify-content: space-evenly;
    width: 100%;
    padding: 0;
  }
  #bottom ul li {
    list-style: none;
    width: 60px;
    height: 60px;
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;
    text-align: center;
  }
  #bottom a {
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
    width: 100%;
    height: 100%;
    color: #666;
    text-decoration: none;
  }
  #bottom ul li i {
    font-size: 1.5rem;
    line-height: 60px;
    margin-bottom: -15px;
    color: #666;
  }
  #bottom ul li span{
    font-size: 12px;
    text-align: center;
  }
  /* 4번째 아이템 (플로팅 버튼) */
  #bottom ul li:nth-of-type(4){
    position: fixed;
    bottom: 10px;
    width: 85px;
    height: 85px;
    border-radius: 50%;
    background: #F2055C;
    border: 8px solid #fff;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.4);
  }
  #bottom ul li:nth-of-type(4) i{
    color: #fff;
    margin-bottom: 0;
  }
  /* 활성 아이템 */
  #bottom .active {
    color: #F2055C;
  }
</style>



    <!-- 하단 바텀바 -->
    <nav id="bottom">
      <ul>
        <li>
          <a href="./index.php" title="홈">
            <i class="bi bi-house"></i>
            <span>홈</span>
          </a>
        </li>
        <li>
          <a href="javascript:void(0);" title="검색">
            <i class="bi bi-search"></i>
            <span>검색</span>
          </a>
        </li>
        <li>
          <a href="javascript:void(0);">
            <i class=""></i>
          </a>
        </li>
        <li>
          <a href="javascript:void(0);" title="내 주변">
            <i class="bi bi-geo-alt-fill"></i>
          </a>
        </li>
        <li>
          <a href="javascript:void(0);" title="소통">
            <i class="bi bi-wechat"></i>
            <span>소통</span>
          </a>
        </li>
        <li>
          <a href="./mypage.php" title="마이">
            <i class="bi bi-person"></i>
            <span>마이</span>
          </a>
        </li>
      </ul>
    </nav>

