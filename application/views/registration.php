<div id="colorlib-main">
	<div class="colorlib-contact">
		<div class="colorlib-narrow-content">
			<div class="row">
				<div class="col-md-12 animate-box" data-animate-effect="fadeInLeft">
					<h2 class="colorlib-heading">会員登録</h2>
				</div>
			</div>
			<div class="row">
				<div class="col-md-7 col-md-push-1" style="left:0;">
					<div class="row">
						<div class="col-md-10 col-md-offset-1 col-md-pull-1 animate-box" data-animate-effect="fadeInLeft">
							<form action="<?php echo base_url('home/registration'); ?>" method="post">
								<div class="form-group">
									<label>名前（他のユーザーに表示されることはありません）</label>
									<span style="color:red;"><?php echo form_error('name'); ?></span>
									<input type="text" name="name" class="form-control" value="<?php echo set_value('name'); ?>">
								</div>
								<div class="form-group">
									<label>ふりがな（他のユーザーに表示されることはありません）</label>
									<span style="color:red;"><?php echo form_error('phonetic'); ?></span>
									<input type="text" name="phonetic" class="form-control" value="<?php echo set_value('phonetic'); ?>">
								</div>
								<div class="form-group">
									<label>ニックネーム</label>
									<span style="color:red;"><?php echo form_error('nickname'); ?></span>
									<input class="form-control" type="text" name="nickname" value="<?php echo set_value('nickname'); ?>">
								</div>
								<div class="form-group" style="width:20%; display:inline-block; margin-right:15px;">
									<label>年</label>
									<span style="color:red;"><?php echo form_error('year'); ?></span>
									<select class="form-control" name="year" value="<?php echo set_value('year'); ?>">
										<option value="">--</option>
										<?php for($y=1920; $y<=date('Y'); $y++): ?>
											<option value="<?php echo $y; ?>"><?php echo $y; ?></option>
										<?php endfor;?>
									</select>
								</div>
								<div class="form-group" style="width:20%; display:inline-block; margin-right:15px;">
									<label>月</label>
									<span style="color:red;"><?php echo form_error('month'); ?></span>
									<select class="form-control" name="month" value="<?php echo set_value('month'); ?>">
										<option value="">--</option>
										<?php for($m=1; $m<=12; $m++): ?>
											<option value="<?php echo $m; ?>"><?php echo $m; ?></option>
										<?php endfor;?>
									</select>
								</div>
								<div class="form-group" style="width:20%; display:inline-block; margin-right:15px;">
								<label>日</label>
								<span style="color:red;"><?php echo form_error('day'); ?></span>
								<select class="form-control" name="day" value="<?php echo set_value('day'); ?>">
									<option value="">--</option>
									<?php for($d=1; $d<=31; $d++): ?>
										<option value="<?php echo $d; ?>"><?php echo $d; ?></option>
									<?php endfor;?>
								</select>
								</div>
								<div class="form-group" style="clear:both;">
									<label>年齢</label>
									<span style="color:red;"><?php echo form_error('age'); ?></span>
									<input class="form-control" type="text" name="age" value="<?php echo set_value('age'); ?>">
								</div>
								<div class="form-group">
									<label>パスワード（パスワードは6〜12文字の英数字でお願いします）</label><br />
									<span style="color:red;"><?php echo form_error('password'); ?></span>
									パスワードを表示 <input type="checkbox" id="passcheck" /><input class="form-control" id="password" type="password" name="password" value="<?php echo set_value('password'); ?>">
								</div>
								<div class="form-group">
									<label>郵便番号（ハイフン不要）</label>
									<span style="color:red;"><?php echo form_error('postal'); ?></span>
									<input class="form-control" type="text" name="postal" size="10" maxlength="7" onKeyUp="AjaxZip3.zip2addr(this,'','prefectures','address');" value="<?php echo set_value('postal'); ?>">
								</div>
								<div class="form-group">
									<label>都道府県</label>
									<span style="color:red;"><?php echo form_error('prefectures'); ?></span>
									<input class="form-control" type="text" name="prefectures" value="<?php echo set_value('prefectures'); ?>">
								</div>
								<div class="form-group">
									<label>住所（番地なども詳しく記入してください。）</label>
									<span style="color:red;"><?php echo form_error('address'); ?></span>
									<input class="form-control" type="text" name="address" value="<?php echo set_value('address'); ?>">
								</div>
								<div class="form-group">
									<label>メールアドレス</label>
									<span style="color:red;"><?php echo form_error('email'); ?></span>
									<input class="form-control" type="text" name="email" value="<?php echo set_value('email'); ?>">
								</div>
								<div class="form-group">
									<label>自己紹介文（任意）（後ほどプロフィールから変更できます）</label>
									<span style="color:red;"><?php echo form_error('introduction'); ?></span>
									<textarea name="introduction" id="message" cols="30" rows="7" class="form-control" placeholder="トレードを希望する人に向けた軽い自己紹介文を書きましょう。気持ちよく取引を行ってもらうために是非書いておきましょう。"></textarea>
								</div>
                                <div class="form-group">
                                    <div class="wrap1">
                                        <div class="wrap2">
                                        <h3 style="text-align:center;">利用規約</h3>
                                        <p>この利用規約（以下，「本規約」といいます。）は，NOGIDIA（以下，「当社」といいます。）がこのウェブサイト上で提供するサービス（以下，「本サービス」といいます。）の利用条件を定めるものです。登録ユーザーの皆さま（以下，「ユーザー」といいます。）には，本規約に従って，本サービスをご利用いただきます。</p>

                                        <h5>第1条（適用）</h5>
                                        <ol>
                                        <li>本規約は，ユーザーと当社との間の本サービスの利用に関わる一切の関係に適用されるものとします。</li>
                                        <li>当社は本サービスに関し，本規約のほか，ご利用にあたってのルール等，各種の定め（以下，「個別規定」といいます。）をすることがあります。これら個別規定はその名称のいかんに関わらず，本規約の一部を構成するものとします。</li>
                                        <li>本規約の規定が前条の個別規定の規定と矛盾する場合には，個別規定において特段の定めなき限り，個別規定の規定が優先されるものとします。</li>
                                        </ol>

                                        <h5>第2条（利用登録）</h5>
                                        <ol>
                                        <li>本サービスにおいては，登録希望者が本規約に同意の上，当社の定める方法によって利用登録を申請し，当社がこれを承認することによって，利用登録が完了するものとします。</li>
                                        <li>当社は，利用登録の申請者に以下の事由があると判断した場合，利用登録の申請を承認しないことがあり，その理由については一切の開示義務を負わないものとします。
                                        <ol>
                                        <li>利用登録の申請に際して虚偽の事項を届け出た場合</li>
                                        <li>本規約に違反したことがある者からの申請である場合</li>
                                        <li>その他，当社が利用登録を相当でないと判断した場合</li>
                                        </ol></li>
                                        </ol>

                                        <h5>第3条（ユーザーIDおよびパスワードの管理）</h5>
                                        <ol>
                                        <li>ユーザーは，自己の責任において，本サービスのユーザーIDおよびパスワードを適切に管理するものとします。</li>
                                        <li>ユーザーは，いかなる場合にも，ユーザーIDおよびパスワードを第三者に譲渡または貸与し，もしくは第三者と共用することはできません。当社は，ユーザーIDとパスワードの組み合わせが登録情報と一致してログインされた場合には，そのユーザーIDを登録しているユーザー自身による利用とみなします。</li>
                                        <li>ユーザーID及びパスワードが第三者によって使用されたことによって生じた損害は，当社に故意又は重大な過失がある場合を除き，当社は一切の責任を負わないものとします。</li>
                                        </ol>

                                        <h5>第4条（利用料金および支払方法）</h5>
                                        <ol>
                                        <li>ユーザーは，本サービスの有料部分の対価として，当社が別途定め，本ウェブサイトに表示する利用料金を，当社が指定する方法により支払うものとします。</li>
                                        <li>ユーザーが利用料金の支払を遅滞した場合には，ユーザーは年14．6％の割合による遅延損害金を支払うものとします。</li>
                                        </ol>

                                        <h5>第5条（禁止事項）</h5>
                                        <p>ユーザーは，本サービスの利用にあたり，以下の行為をしてはなりません。</p>

                                        <ol>
                                        <li>法令または公序良俗に違反する行為</li>
                                        <li>犯罪行為に関連する行為</li>
                                        <li>本サービスの内容等，本サービスに含まれる著作権，商標権ほか知的財産権を侵害する行為</li>
                                        <li>当社，ほかのユーザー，またはその他第三者のサーバーまたはネットワークの機能を破壊したり，妨害したりする行為</li>
                                        <li>本サービスによって得られた情報を商業的に利用する行為</li>
                                        <li>当社のサービスの運営を妨害するおそれのある行為</li>
                                        <li>不正アクセスをし，またはこれを試みる行為</li>
                                        <li>他のユーザーに関する個人情報等を収集または蓄積する行為</li>
                                        <li>不正な目的を持って本サービスを利用する行為</li>
                                        <li>本サービスの他のユーザーまたはその他の第三者に不利益，損害，不快感を与える行為</li>
                                        <li>他のユーザーに成りすます行為</li>
                                        <li>当社が許諾しない本サービス上での宣伝，広告，勧誘，または営業行為</li>
                                        <li>面識のない異性との出会いを目的とした行為</li>
                                        <li>当社のサービスに関連して，反社会的勢力に対して直接または間接に利益を供与する行為</li>
                                        <li>その他，当社が不適切と判断する行為</li>
                                        </ol>

                                        <h5>第6条（本サービスの提供の停止等）</h5>
                                        <ol>
                                        <li>当社は，以下のいずれかの事由があると判断した場合，ユーザーに事前に通知することなく本サービスの全部または一部の提供を停止または中断することができるものとします。
                                        <ol>
                                        <li>本サービスにかかるコンピュータシステムの保守点検または更新を行う場合</li>
                                        <li>地震，落雷，火災，停電または天災などの不可抗力により，本サービスの提供が困難となった場合</li>
                                        <li>コンピュータまたは通信回線等が事故により停止した場合</li>
                                        <li>その他，当社が本サービスの提供が困難と判断した場合</li>
                                        </ol></li>
                                        <li>当社は，本サービスの提供の停止または中断により，ユーザーまたは第三者が被ったいかなる不利益または損害についても，一切の責任を負わないものとします。</li>
                                        </ol>

                                        <h5>第7条（利用制限および登録抹消）</h5>
                                        <ol>
                                        <li>当社は，ユーザーが以下のいずれかに該当する場合には，事前の通知なく，ユーザーに対して，本サービスの全部もしくは一部の利用を制限し，またはユーザーとしての登録を抹消することができるものとします。
                                        <ol>
                                        <li>本規約のいずれかの条項に違反した場合</li>
                                        <li>登録事項に虚偽の事実があることが判明した場合</li>
                                        <li>料金等の支払債務の不履行があった場合</li>
                                        <li>当社からの連絡に対し，一定期間返答がない場合</li>
                                        <li>本サービスについて，最終の利用から一定期間利用がない場合</li>
                                        <li>その他，当社が本サービスの利用を適当でないと判断した場合</li>
                                        </ol></li>
                                        <li>当社は，本条に基づき当社が行った行為によりユーザーに生じた損害について，一切の責任を負いません。</li>
                                        </ol>

                                        <h5>第8条（退会）</h5>
                                        <p>ユーザーは，当社の定める退会手続により，本サービスから退会できるものとします。</p>

                                        <h5>第9条（保証の否認および免責事項）</h5>
                                        <ol>
                                        <li>当社は，本サービスに事実上または法律上の瑕疵（安全性，信頼性，正確性，完全性，有効性，特定の目的への適合性，セキュリティなどに関する欠陥，エラーやバグ，権利侵害などを含みます。）がないことを明示的にも黙示的にも保証しておりません。</li>
                                        <li>当社は，本サービスに起因してユーザーに生じたあらゆる損害について一切の責任を負いません。ただし，本サービスに関する当社とユーザーとの間の契約（本規約を含みます。）が消費者契約法に定める消費者契約となる場合，この免責規定は適用されません。</li>
                                        <li>前項ただし書に定める場合であっても，当社は，当社の過失（重過失を除きます。）による債務不履行または不法行為によりユーザーに生じた損害のうち特別な事情から生じた損害（当社またはユーザーが損害発生につき予見し，または予見し得た場合を含みます。）について一切の責任を負いません。また，当社の過失（重過失を除きます。）による債務不履行または不法行為によりユーザーに生じた損害の賠償は，ユーザーから当該損害が発生した月に受領した利用料の額を上限とします。</li>
                                        <li>当社は，本サービスに関して，ユーザーと他のユーザーまたは第三者との間において生じた取引，連絡または紛争等について一切責任を負いません。</li>
                                        </ol>

                                        <h5>第10条（サービス内容の変更等）</h5>
                                        <p>当社は，ユーザーに通知することなく，本サービスの内容を変更しまたは本サービスの提供を中止することができるものとし，これによってユーザーに生じた損害について一切の責任を負いません。</p>

                                        <h5>第11条（利用規約の変更）</h5>
                                        <p>当社は，必要と判断した場合には，ユーザーに通知することなくいつでも本規約を変更することができるものとします。なお，本規約の変更後，本サービスの利用を開始した場合には，当該ユーザーは変更後の規約に同意したものとみなします。</p>

                                        <h5>第12条（個人情報の取扱い）</h5>
                                        <p>当社は，本サービスの利用によって取得する個人情報については，当社「プライバシーポリシー」に従い適切に取り扱うものとします。</p>

                                        <h5>第13条（通知または連絡）</h5>
                                        <p>ユーザーと当社との間の通知または連絡は，当社の定める方法によって行うものとします。当社は,ユーザーから,当社が別途定める方式に従った変更届け出がない限り,現在登録されている連絡先が有効なものとみなして当該連絡先へ通知または連絡を行い,これらは,発信時にユーザーへ到達したものとみなします。</p>

                                        <h5>第14条（権利義務の譲渡の禁止）</h5>
                                        <p>ユーザーは，当社の書面による事前の承諾なく，利用契約上の地位または本規約に基づく権利もしくは義務を第三者に譲渡し，または担保に供することはできません。</p>

                                        <h5>第15条（準拠法・裁判管轄）</h5>
                                        <ol>
                                        <li>本規約の解釈にあたっては，日本法を準拠法とします。</li>
                                        <li>本サービスに関して紛争が生じた場合には，当社の本店所在地を管轄する裁判所を専属的合意管轄とします。</li>
                                        </ol>

                                        <p class="tR">以上</p>


                                        </div><!--／wrapHINAGATA-->    
                                    </div><!--／wrapKOPIPE-->
                                </div>
                                <div class="form-group">
                                	<span style="color:red; text-align:center;"><?php echo form_error('kiyaku'); ?></span>
                                    <h5 style="text-align:center;"><input type="checkbox" name="kiyaku" value="1">利用規約の同意する</h5>
                                </div>
								<div class="form-group">
									<input type="submit" class="btn btn-lg btn-primary btn-block" value="会員登録する">
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<!--div id="fh5co-main">
	<div class="fh5co-narrow-content animate-box" data-animate-effect="fadeInLeft">
		
		<div class="row">
			<div class="col-md-4">
				<h2>会員登録をして下さい。</h2>
			</div>
		</div>
		<form method="post" action="<?php echo base_url('home/registration'); ?>">
			<div class="row">
				<div class="col-md-12">
					<div class="row">
						<div class="col-md-6">
							<div class="form-group">
								<label>名前（他のユーザーに表示されることはありません）</label>
								<span style="color:red;"><?php echo form_error('name'); ?></span>
								<input type="text" name="name" class="form-control" value="<?php echo set_value('name'); ?>">
							</div>
							<div class="form-group">
								<label>ふりがな（他のユーザーに表示されることはありません）</label>
								<span style="color:red;"><?php echo form_error('phonetic'); ?></span>
								<input type="text" name="phonetic" class="form-control" value="<?php echo set_value('phonetic'); ?>">
							</div>
							<div class="form-group">
								<label>ニックネーム</label>
								<span style="color:red;"><?php echo form_error('nickname'); ?></span>
								<input class="form-control" type="text" name="nickname" value="<?php echo set_value('nickname'); ?>">
							</div>
							<div class="form-group" style="width:20%; display:inline-block; margin-right:15px;">
								<label>年</label>
								<span style="color:red;"><?php echo form_error('year'); ?></span>
								<select class="form-control" name="year" value="<?php echo set_value('year'); ?>">
									<option value="">--</option>
									<?php for($y=1920; $y<=date('Y'); $y++): ?>
										<option value="<?php echo $y; ?>"><?php echo $y; ?></option>
									<?php endfor;?>
								</select>
							</div>
							<div class="form-group" style="width:20%; display:inline-block; margin-right:15px;">
								<label>月</label>
								<span style="color:red;"><?php echo form_error('month'); ?></span>
								<select class="form-control" name="month" value="<?php echo set_value('month'); ?>">
									<option value="">--</option>
									<?php for($m=1; $m<=12; $m++): ?>
										<option value="<?php echo $m; ?>"><?php echo $m; ?></option>
									<?php endfor;?>
								</select>
							</div>
							<div class="form-group" style="width:20%; display:inline-block; margin-right:15px;">
								<label>日</label>
								<span style="color:red;"><?php echo form_error('day'); ?></span>
								<select class="form-control" name="day" value="<?php echo set_value('day'); ?>">
									<option value="">--</option>
									<?php for($d=1; $d<=31; $d++): ?>
										<option value="<?php echo $d; ?>"><?php echo $d; ?></option>
									<?php endfor;?>
								</select>
							</div>
							<div class="form-group" style="clear:both;">
								<label>年齢</label>
								<span style="color:red;"><?php echo form_error('age'); ?></span>
								<input class="form-control" type="text" name="age" value="<?php echo set_value('age'); ?>">
							</div>
							<div class="form-group">
								<label>パスワード（パスワードは6〜12文字の英数字でお願いします）</label><br />
								<span style="color:red;"><?php echo form_error('password'); ?></span>
								パスワードを表示 <input type="checkbox" id="passcheck" /><input class="form-control" id="password" type="password" name="password" value="<?php echo set_value('password'); ?>">
							</div>
							<div class="form-group">
								<label>郵便番号（ハイフン不要）</label>
								<span style="color:red;"><?php echo form_error('postal'); ?></span>
								<input class="form-control" type="text" name="postal" size="10" maxlength="7" onKeyUp="AjaxZip3.zip2addr(this,'','prefectures','address');" value="<?php echo set_value('postal'); ?>">
							</div>
							<div class="form-group">
								<label>都道府県</label>
								<span style="color:red;"><?php echo form_error('prefectures'); ?></span>
								<input class="form-control" type="text" name="prefectures" value="<?php echo set_value('prefectures'); ?>">
							</div>
							<div class="form-group">
								<label>住所（番地なども詳しく記入してください。）</label>
								<span style="color:red;"><?php echo form_error('address'); ?></span>
								<input class="form-control" type="text" name="address" value="<?php echo set_value('address'); ?>">
							</div>
							<div class="form-group">
								<label>メールアドレス</label>
								<span style="color:red;"><?php echo form_error('email'); ?></span>
								<input class="form-control" type="text" name="email" value="<?php echo set_value('email'); ?>">
							</div>
							<div class="form-group">
								<label>自己紹介文（任意）（後ほどプロフィールから変更できます）</label>
								<span style="color:red;"><?php echo form_error('introduction'); ?></span>
								<textarea name="introduction" id="message" cols="30" rows="7" class="form-control" placeholder="トレードを希望する人に向けた軽い自己紹介文を書きましょう。気持ちよく取引を行ってもらうために是非書いておきましょう。"></textarea>
							</div>
							<div class="form-group">
								<input type="submit" class="btn btn-lg btn-success btn-block" value="会員登録する">
							</div>
						</div>
					</div>
				</div>
				
			</div>
		</form>
	</div>
</div-->

<script>
$(function() {
	$('#passcheck').change(function(){
		if ( $(this).prop('checked') ) {
			$('#password').attr('type','text');
		} else {
			$('#password').attr('type','password');
		}
	});
});
</script>