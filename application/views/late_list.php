<!--h2 class="fh5co-heading animate-box" data-animate-effect="fadeInLeft">出品リスト一覧</h2>-->
<div id="colorlib-main">
    <div class="colorlib-services">
        <div class="colorlib-narrow-content">
            <div class="row">
                <div class="col-md-6 col-md-offset-3 col-md-pull-3 animate-box" data-animate-effect="fadeInLeft">
                    <h2 class="colorlib-heading heading">レート表</h2>
                </div>
            </div>
            <div class="col-md-6 col-md-offset-3 col-md-pull-3 animate-box" data-animate-effect="fadeInLeft">
                <div id="tab01">
                    <div class="row" style="float:left; width:500px; margin-right: -200px;">
                        <table id="list">
                            <tr>
                                <th>レート</th>
                                <th>メンバー</th>
                            </tr>
                            <?php foreach($late_lists as $late => $late_list): ?>
                            
                            <tr>
                                <td><?php echo $late; ?></td>
                                
                                <td>
                                    <?php foreach($late_list as $list): ?>
                                    <?php echo $list; ?>
                                    <br />
                                    <?php endforeach; ?>
                                </td>
                                
                            </tr>
                            
                            <?php endforeach; ?>
                            <tr>
                                <td colspan="2"><?php echo $date; ?>更新</td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>