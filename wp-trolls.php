<?php
/*
Plugin Name: Wordpress Trolls
Plugin URI: http://scratchbook.ch/2012/02/16/wordpress-trolls/
Description: Display trollfaces in your posts
Version: 0.3
Author: Claude Hohl
Author URI: http://scratchbook.ch
License: GPL
*/
add_filter('the_content', 'make_trolls');

function make_trolls($content) 
{
	$content = str_replace('<p>[troll', '[troll', $content);
	$content = str_replace('[troll]</p>', '[troll]', $content);
	$content = preg_replace_callback('/\[troll\|(.*?)(\|.*?)?\](.*?)\[troll\]/s', 'parse_troll', $content);
	return $content;
}

function parse_troll($str) 
{
	$troll = $str[1];
	$quote = $str[2];
	$text = $str[3];
	$text = str_replace('<br />', "\r\n", $text);
	$text = trim($text);
	$text = str_replace("\r\n", '<br />', $text);
	$img = get_img($troll);

	//
	$r = '';
	$r.= '<div style="overflow: hidden; padding-bottom: 1em;">';
	$r.= '<div style="float: left; padding-right: 15px; width: ' . $img[1] . 'px;">';
	$r.= '<img src="' . $img[0] . '" width="' . $img[1] . '" height="' . $img[2] . '" alt="' . $troll . '"></img>';
	$r.= '</div>';
	$r.= '<div style="overflow: hidden;">';
	
	if ($quote) 
	{
		$r.= '<blockquote><p>';
	}
	$r.= $text;
	
	if ($quote) 
	{
		$r.= '</p></blockquote>';
	}
	$r.= '</div>';
	$r.= '</div>';

	//
	return $r;
}

function get_img($troll) 
{

	//paths
	$plugin_url = plugin_dir_url(__FILE__);
	$plugin_path = plugin_dir_path(__FILE__);

	//copied from mappings.js
	$rages = array();
	$rages['trollicons'] = "img/Trollicons-trollicons.png";
	$rages['actually'] = "img/Actually/Actually-actually-okay3.png";
	$rages['okay3'] = "img/Actually/Actually-actually-okay3.png";
	$rages['itsnotokay'] = "img/Actually/It's Not Okay-itsnotokay-okay4.png";
	$rages['okay4'] = "img/Actually/It's Not Okay-itsnotokay-okay4.png";
	$rages['sadshadow'] = "img/Actually/Sad Shadow-sadshadow-okay2.png";
	$rages['okay2'] = "img/Actually/Sad Shadow-sadshadow-okay2.png";
	$rages['whoa'] = "img/Amazed/Dumbfounded Kid-whoa-ooh.png";
	$rages['ooh'] = "img/Amazed/Dumbfounded Kid-whoa-ooh.png";
	$rages['gasp'] = "img/Amazed/Gasp-gasp.png";
	$rages['milk'] = "img/Amazed/Milk-milk.png";
	$rages['moonshot'] = "img/Amazed/Moonshot-moonshot-noway-shocked.png";
	$rages['noway'] = "img/Amazed/Moonshot-moonshot-noway-shocked.png";
	$rages['shocked'] = "img/Amazed/Moonshot-moonshot-noway-shocked.png";
	$rages['notbadobama'] = "img/Amazed/Not Bad Obama-notbadobama-notbad-obama.png";
	$rages['notbad'] = "img/Amazed/Not Bad Obama-notbadobama-notbad-obama.png";
	$rages['obama'] = "img/Amazed/Not Bad Obama-notbadobama-notbad-obama.png";
	$rages['blankrage'] = "img/Amazed/Rage Blank-blankrage.png";
	$rages['surprised3'] = "img/Amazed/Surprised Wide Open Mouth-surprised3.png";
	$rages['surprised1'] = "img/Amazed/surprised-surprised1-surprised.png";
	$rages['surprised'] = "img/Amazed/surprised-surprised1-surprised.png";
	$rages['wait'] = "img/Amazed/Wait-wait-awno.png";
	$rages['clevergirl'] = "img/Amazed/Clever Girl-clevergirl.jpg";
	$rages['awno'] = "img/Amazed/Wait-wait-awno.png";
	$rages['deskflip'] = "img/Angry/Desk flip-deskflip-flip-tableflip-desk-table.png";
	$rages['drool'] = "img/Angry/Drool-drool.png";
	$rages['eyes'] = "img/Angry/Eyes-eyes-fff-imminent.png";
	$rages['fff'] = "img/Angry/Eyes-eyes-fff-imminent.png";
	$rages['imminent'] = "img/Angry/Eyes-eyes-fff-imminent.png";
	$rages['son'] = "img/Angry/I Am Disappoint-son-disappoint.png";
	$rages['disappoint'] = "img/Angry/I Am Disappoint-son-disappoint.png";
	$rages['look'] = "img/Angry/Look-look.png";
	$rages['mom'] = "img/Angry/Mom-mom.png";
	$rages['no'] = "img/Angry/No-no.png";
	$rages['notokay'] = "img/Angry/Not Okay-notokay-bitter.png";
	$rages['bitter'] = "img/Angry/Not Okay-notokay-bitter.png";
	$rages['shaking'] = "img/Angry/Shaking-shaking.png";
	$rages['sidemouth'] = "img/Angry/Side Mouth-sidemouth-lefu.png";
	$rages['lefu'] = "img/Angry/Side Mouth-sidemouth-lefu.png";
	$rages['stare'] = "img/Angry/Stare-stare.png";
	$rages['uhm'] = "img/Angry/Uhm-uhm-mad.png";
	$rages['mad'] = "img/Angry/Uhm-uhm-mad.png";
	$rages['whathaveyoudone'] = "img/Angry/What Have You Done-whathaveyoudone-whyd-done.png";
	$rages['whyd'] = "img/Angry/What Have You Done-whathaveyoudone-whyd-done.png";
	$rages['done'] = "img/Angry/What Have You Done-whathaveyoudone-whyd-done.png";
	$rages['yuno'] = "img/Angry/Y U NO-yuno.png";
	$rages['beerguy'] = "img/Cereal guy/Beer Guy-beerguy-beer.png";
	$rages['beer'] = "img/Cereal guy/Beer Guy-beerguy-beer.png";
	$rages['cerealguyangry'] = "img/Cereal guy/Cereal Guy Angry-cerealguyangry-cerealangry.png";
	$rages['cerealangry'] = "img/Cereal guy/Cereal Guy Angry-cerealguyangry-cerealangry.png";
	$rages['cerealguysquint'] = "img/Cereal guy/Cereal Guy Squint-cerealguysquint-cerealsquint.png";
	$rages['cerealsquint'] = "img/Cereal guy/Cereal Guy Squint-cerealguysquint-cerealsquint.png";
	$rages['cerealguy'] = "img/Cereal guy/Cereal Guy-cerealguy-cereal.png";
	$rages['cereal'] = "img/Cereal guy/Cereal Guy-cerealguy-cereal.png";
	$rages['cerealspit'] = "img/Cereal guy/Cereal Spitting-cerealspit-spit.png";
	$rages['spit'] = "img/Cereal guy/Cereal Spitting-cerealspit-spit.png";
	$rages['newspaperguytear'] = "img/Cereal guy/Newspaper Guy Tear-newspaperguytear-newspapertear-tear.png";
	$rages['newspapertear'] = "img/Cereal guy/Newspaper Guy Tear-newspaperguytear-newspapertear-tear.png";
	$rages['tear'] = "img/Cereal guy/Newspaper Guy Tear-newspaperguytear-newspapertear-tear.png";
	$rages['newspaperguy'] = "img/Cereal guy/Newspaper Guy-newspaperguy-newspaper.png";
	$rages['newspaper'] = "img/Cereal guy/Newspaper Guy-newspaperguy-newspaper.png";
	$rages['challengeconsidered'] = "img/Determined/Challenge Considered-challengeconsidered-considered.png";
	$rages['considered'] = "img/Determined/Challenge Considered-challengeconsidered-considered.png";
	$rages['challenge'] = "img/Determined/Challenge-challenge.png";
	$rages['notsure'] = "img/Determined/Conflicting Emotions-notsure-dunno.png";
	$rages['dunno'] = "img/Determined/Conflicting Emotions-notsure-dunno.png";
	$rages['sweat'] = "img/Determined/Crazy Concentrate Sweat-sweat-workinghard.png";
	$rages['workinghard'] = "img/Determined/Crazy Concentrate Sweat-sweat-workinghard.png";
	$rages['fumanchu'] = "img/Determined/Fu Manchu-fumanchu.png";
	$rages['gah'] = "img/Determined/Gah-gah-sweaty.png";
	$rages['sweaty'] = "img/Determined/Gah-gah-sweaty.png";
	$rages['hmm'] = "img/Determined/Hmm-hmm.png";
	$rages['itstime'] = "img/Determined/It's Time-itstime-serious-determined.png";
	$rages['serious'] = "img/Determined/It's Time-itstime-serious-determined.png";
	$rages['determined'] = "img/Determined/It's Time-itstime-serious-determined.png";
	$rages['everythingwentbetterthanexpected'] = "img/Happy/Everything Went Better Than Expected-everythingwentbetterthanexpected-betterthanexpected-ewbte.png";
	$rages['betterthanexpected'] = "img/Happy/Everything Went Better Than Expected-everythingwentbetterthanexpected-betterthanexpected-ewbte.png";
	$rages['ewbte'] = "img/Happy/Everything Went Better Than Expected-everythingwentbetterthanexpected-betterthanexpected-ewbte.png";
	$rages['ya'] = "img/Happy/Excited-ya-yey.png";
	$rages['yey'] = "img/Happy/Excited-ya-yey.png";
	$rages['foreveraloneexcited'] = "img/Happy/Forever Alone Excited-foreveraloneexcited-faexcited-falaugh-friends.png";
	$rages['faexcited'] = "img/Happy/Forever Alone Excited-foreveraloneexcited-faexcited-falaugh-friends.png";
	$rages['falaugh'] = "img/Happy/Forever Alone Excited-foreveraloneexcited-faexcited-falaugh-friends.png";
	$rages['friends'] = "img/Happy/Forever Alone Excited-foreveraloneexcited-faexcited-falaugh-friends.png";
	$rages['grandma'] = "img/Happy/Grandma-grandma-granny.png";
	$rages['granny'] = "img/Happy/Grandma-grandma-granny.png";
	$rages['happy'] = "img/Happy/Happy-happy.png";
	$rages['hatersgonnahate'] = "img/Happy/Haters Gonna Hate-hatersgonnahate-haters-hgh.png";
	$rages['haters'] = "img/Happy/Haters Gonna Hate-hatersgonnahate-haters-hgh.png";
	$rages['hgh'] = "img/Happy/Haters Gonna Hate-hatersgonnahate-haters-hgh.png";
	$rages['hehheh'] = "img/Happy/Heh heh-hehheh-hehehe.png";
	$rages['hehehe'] = "img/Happy/Heh heh-hehheh-hehehe.png";
	$rages['isee'] = "img/Happy/I See-isee-iseewhatyoudidthere.png";
	$rages['overjoyed'] = "img/Happy/Overjoyed-overjoyed-nowords-daww.png";
	$rages['ok'] = "img/Happy/Ok-ok-nice-great-thumb-thumbs.png";
	$rages['nice'] = "img/Happy/Ok-ok-nice-great-thumb-thumbs.png";
	$rages['great'] = "img/Happy/Ok-ok-nice-great-thumb-thumbs.png";
	$rages['thumb'] = "img/Happy/Ok-ok-nice-great-thumb-thumbs.png";
	$rages['perfect'] = "img/Happy/Perfect-perfect-biggrin.png";
	$rages['biggrin'] = "img/Happy/Perfect-perfect-biggrin.png";
	$rages['satisfied'] = "img/Happy/Satisfied-satisfied-relief-ahh-ah.png";
	$rages['relief'] = "img/Happy/Satisfied-satisfied-relief-ahh-ah.png";
	$rages['ahh'] = "img/Happy/Satisfied-satisfied-relief-ahh-ah.png";
	$rages['ah'] = "img/Happy/Satisfied-satisfied-relief-ahh-ah.png";
	$rages['smile'] = "img/Happy/Smile-smile-catsmile.png";
	$rages['catsmile'] = "img/Happy/Smile-smile-catsmile.png";
	$rages['win'] = "img/Happy/Win-win-epicwin.png";
	$rages['epicwin'] = "img/Happy/Win-win-epicwin.png";
	$rages['celo'] = "img/Laughing/Aint That Some Shit-celo-aintthatsomeshit.png";
	$rages['aintthatsomeshit'] = "img/Laughing/Aint That Some Shit-celo-aintthatsomeshit.png";
	$rages['awyea'] = "img/Laughing/Awww Yea-awyea-awyeah-ay.png";
	$rages['awyeah'] = "img/Laughing/Awww Yea-awyea-awyeah-ay.png";
	$rages['ay'] = "img/Laughing/Awww Yea-awyea-awyeah-ay.png";
	$rages['rightfuckthat'] = "img/Laughing/Fuck That Shit Right-rightfuckthat-rft.png";
	$rages['rft'] = "img/Laughing/Fuck That Shit Right-rightfuckthat-rft.png";
	$rages['fuckthatshit'] = "img/Laughing/Fuck That Shit-fuckthatshit-fuckthat-ft-leftfuckthat-lft.png";
	$rages['fuckthat'] = "img/Laughing/Fuck That Shit-fuckthatshit-fuckthat-ft-leftfuckthat-lft.png";
	$rages['ft'] = "img/Laughing/Fuck That Shit-fuckthatshit-fuckthat-ft-leftfuckthat-lft.png";
	$rages['leftfuckthat'] = "img/Laughing/Fuck That Shit-fuckthatshit-fuckthat-ft-leftfuckthat-lft.png";
	$rages['lft'] = "img/Laughing/Fuck That Shit-fuckthatshit-fuckthat-ft-leftfuckthat-lft.png";
	$rages['high'] = "img/Laughing/High-high.png";
	$rages['ooo'] = "img/Laughing/LOL (No Text)-ooo.png";
	$rages['lol'] = "img/Laughing/LOL-lol-LOL.png";
	$rages['LOL'] = "img/Laughing/LOL-lol-LOL.png";
	$rages['pft2'] = "img/Laughing/Pffttchhchhh-pft2-expectant.png";
	$rages['expectant'] = "img/Laughing/Pffttchhchhh-pft2-expectant.png";
	$rages['pft'] = "img/Laughing/Pft-pft-lulz.png";
	$rages['lulz'] = "img/Laughing/Pft-pft-lulz.png";
	$rages['deviltroll'] = "img/Malicious/Devil Troll-deviltroll-evil.png";
	$rages['evil'] = "img/Malicious/Devil Troll-deviltroll-evil.png";
	$rages['dbag'] = "img/Malicious/Douchebag-dbag-brah-douche-douchebag.png";
	$rages['brah'] = "img/Malicious/Douchebag-dbag-brah-douche-douchebag.png";
	$rages['douche'] = "img/Malicious/Douchebag-dbag-brah-douche-douchebag.png";
	$rages['douchebag'] = "img/Malicious/Douchebag-dbag-brah-douche-douchebag.png";
	$rages['evilsmile'] = "img/Malicious/Evil Smile-evilsmile-hah.png";
	$rages['hah'] = "img/Malicious/Evil Smile-evilsmile-hah.png";
	$rages['gaytroll'] = "img/Malicious/Gay Troll-gaytroll.png";
	$rages['grannytroll'] = "img/Malicious/Granny Troll-grannytroll.png";
	$rages['grinch'] = "img/Malicious/Grinch-grinch.png";
	$rages['ilied'] = "img/Malicious/I Lied-ilied-wayevil.png";
	$rages['wayevil'] = "img/Malicious/I Lied-ilied-wayevil.png";
	$rages['melvin'] = "img/Malicious/Melvin-melvin.png";
	$rages['problemguy'] = "img/Malicious/Problem Guy-problemguy-okaytroll.png";
	$rages['okaytroll'] = "img/Malicious/Problem Guy-problemguy-okaytroll.png";
	$rages['happyrage'] = "img/Malicious/Rage Happy-happyrage-hrage.png";
	$rages['hrage'] = "img/Malicious/Rage Happy-happyrage-hrage.png";
	$rages['sadmelvin'] = "img/Malicious/Sad Melvin-sadmelvin.png";
	$rages['sadtroll'] = "img/Malicious/Sad Troll-sadtroll.png";
	$rages['trolldadjump'] = "img/Malicious/Troll Dad Jump-trolldadjump-tdjump-tdj.png";
	$rages['tdjump'] = "img/Malicious/Troll Dad Jump-trolldadjump-tdjump-tdj.png";
	$rages['tdj'] = "img/Malicious/Troll Dad Jump-trolldadjump-tdjump-tdj.png";
	$rages['trolldadmonocle'] = "img/Malicious/Troll Dad Monocle-trolldadmonocle-trolldadm-tdm.png";
	$rages['trolldadm'] = "img/Malicious/Troll Dad Monocle-trolldadmonocle-trolldadm-tdm.png";
	$rages['tdm'] = "img/Malicious/Troll Dad Monocle-trolldadmonocle-trolldadm-tdm.png";
	$rages['trollhot'] = "img/Malicious/Troll Hot-trollhot-hottroll-babe.png";
	$rages['hottroll'] = "img/Malicious/Troll Hot-trollhot-hottroll-babe.png";
	$rages['babe'] = "img/Malicious/Troll Hot-trollhot-hottroll-babe.png";
	$rages['insanetroll'] = "img/Malicious/Troll Insane-insanetroll-insane-excited.png";
	$rages['insane'] = "img/Malicious/Troll Insane-insanetroll-insane-excited.png";
	$rages['trolol'] = "img/Malicious/Troll Lol-trolol-trollol-trolllol.png";
	$rages['peek'] = "img/Malicious/Troll peeking-peek-trollpeek.png";
	$rages['excited'] = "img/Malicious/Troll Insane-insanetroll-insane-excited.png";
	$rages['troll'] = "img/Malicious/Troll-troll-problem-umad.png";
	$rages['problem'] = "img/Malicious/Troll-troll-problem-umad.png";
	$rages['umad'] = "img/Malicious/Troll-troll-problem-umad.png";
	$rages['trolldad'] = "img/Malicious/TrollDad-trolldad.png";
	$rages['busted'] = "img/Miscellaneous/Busted-busted-oops.png";
	$rages['allthethings'] = "img/Miscellaneous/All the things-allthethings.png";
	$rages['oops'] = "img/Miscellaneous/Busted-busted-oops.png";
	$rages['confused'] = "img/Miscellaneous/Confused-confused-butwhy.png";
	$rages['butwhy'] = "img/Miscellaneous/Confused-confused-butwhy.png";
	$rages['drunk'] = "img/Miscellaneous/Drunk-drunk.png";
	$rages['epicfailguy'] = "img/Miscellaneous/Epic Fail Guy-epicfailguy-efg.png";
	$rages['efg'] = "img/Miscellaneous/Epic Fail Guy-epicfailguy-efg.png";
	$rages['errg'] = "img/Miscellaneous/Errg-errg-release.png";
	$rages['release'] = "img/Miscellaneous/Errg-errg-release.png";
	$rages['grandmashit'] = "img/Miscellaneous/Grandma Shit-grandmashit-shit.png";
	$rages['shit'] = "img/Miscellaneous/Grandma Shit-grandmashit-shit.png";
	$rages['rocket'] = "img/Miscellaneous/Nothing to do here-rocket-jetpack.png";
	$rages['rohgod'] = "img/Miscellaneous/Oh God Right-rohgod-rgross-rwtf.png";
	$rages['rgross'] = "img/Miscellaneous/Oh God Right-rohgod-rgross-rwtf.png";
	$rages['rwtf'] = "img/Miscellaneous/Oh God Right-rohgod-rgross-rwtf.png";
	$rages['ohgod'] = "img/Miscellaneous/Oh God-ohgod-gross-wtf-lgross-lwtf.png";
	$rages['gross'] = "img/Miscellaneous/Oh God-ohgod-gross-wtf-lgross-lwtf.png";
	$rages['wtf'] = "img/Miscellaneous/Oh God-ohgod-gross-wtf-lgross-lwtf.png";
	$rages['omgrun'] = "img/Miscellaneous/Omg Run-omgrun-run.png";
	$rages['soclose'] = "img/Miscellaneous/So Close-soclose.png";
	$rages['subtle'] = "img/Miscellaneous/Spiderpman-subtle-nonchalant.png";
	$rages['ltada'] = "img/Miscellaneous/Tada left-ltada.png";
	$rages['tada'] = "img/Miscellaneous/Tada-tada-rtada.png";
	$rages['lgross'] = "img/Miscellaneous/Oh God-ohgod-gross-wtf-lgross-lwtf.png";
	$rages['lwtf'] = "img/Miscellaneous/Oh God-ohgod-gross-wtf-lgross-lwtf.png";
	$rages['throwupinmouth'] = "img/Miscellaneous/Throw Up In Mouth-throwupinmouth-throwup-fullmouth.png";
	$rages['throwup'] = "img/Miscellaneous/Throw Up In Mouth-throwupinmouth-throwup-fullmouth.png";
	$rages['fullmouth'] = "img/Miscellaneous/Throw Up In Mouth-throwupinmouth-throwup-fullmouth.png";
	$rages['truestory'] = "img/Miscellaneous/True Story-truestory.png";
	$rages['concerned'] = "img/Miscellaneous/What-concerned.png";
	$rages['mommy'] = "img/Miscellaneous/Youthful Fear-mommy-zomg.png";
	$rages['zomg'] = "img/Miscellaneous/Youthful Fear-mommy-zomg.png";
	$rages['badpokerface'] = "img/Neutral/Bad Poker Face-badpokerface-badpoker.png";
	$rages['badpoker'] = "img/Neutral/Bad Poker Face-badpokerface-badpoker.png";
	$rages['beh'] = "img/Neutral/Beh-beh.png";
	$rages['dazed'] = "img/Neutral/Dazed-dazed.png";
	$rages['comeon'] = "img/Neutral/Dude Come On Smile-comeon.png";
	$rages['dude'] = "img/Neutral/Dude-dude-meh.png";
	$rages['meh'] = "img/Neutral/Dude-dude-meh.png";
	$rages['working'] = "img/Neutral/Occupied-working-busy-focus.png";
	$rages['busy'] = "img/Neutral/Occupied-working-busy-focus.png";
	$rages['focus'] = "img/Neutral/Occupied-working-busy-focus.png";
	$rages['thickpokerface'] = "img/Neutral/Poker Face Thick-thickpokerface-thickpoker-guilty.png";
	$rages['thickpoker'] = "img/Neutral/Poker Face Thick-thickpokerface-thickpoker-guilty.png";
	$rages['guilty'] = "img/Neutral/Poker Face Thick-thickpokerface-thickpoker-guilty.png";
	$rages['pokerface'] = "img/Neutral/Poker Face-pokerface-poker-pf.png";
	$rages['poker'] = "img/Neutral/Poker Face-pokerface-poker-pf.png";
	$rages['pf'] = "img/Neutral/Poker Face-pokerface-poker-pf.png";
	$rages['richfu'] = "img/Neutral/Rich Fu-richfu-rich-quite.png";
	$rages['rich'] = "img/Neutral/Rich Fu-richfu-rich-quite.png";
	$rages['quite'] = "img/Neutral/Rich Fu-richfu-rich-quite.png";
	$rages['straight'] = "img/Neutral/Straight-straight.png";
	$rages['thingswentokay'] = "img/Neutral/ThingsWentOkay-thingswentokay-wentokay.png";
	$rages['wentokay'] = "img/Neutral/ThingsWentOkay-thingswentokay-wentokay.png";
	$rages['tongue'] = "img/Neutral/Tongue-tongue.png";
	$rages['wah'] = "img/Neutral/Wah-wah-huh.png";
	$rages['huh'] = "img/Neutral/Wah-wah-huh.png";
	$rages['wat'] = "img/Neutral/Wat-wat-suspicious.png";
	$rages['suspicious'] = "img/Neutral/Wat-wat-suspicious.png";
	$rages['yawn'] = "img/Neutral/Yawn-yawn.png";
	$rages['classyfap'] = "img/Pleasure/Classy Fap-classyfap-richfap.png";
	$rages['richfap'] = "img/Pleasure/Classy Fap-classyfap-richfap.png";
	$rages['dogsweetjesus'] = "img/Pleasure/Dog Sweet Jesus-dogsweetjesus.png";
	$rages['fap'] = "img/Pleasure/Fap Fap-fap-fapfap-fapfapfap.png";
	$rages['fapfap'] = "img/Pleasure/Fap Fap-fap-fapfap-fapfapfap.png";
	$rages['fapfapfap'] = "img/Pleasure/Fap Fap-fap-fapfap-fapfapfap.png";
	$rages['femalefap'] = "img/Pleasure/Female Fap-femalefap-schlick.png";
	$rages['schlick'] = "img/Pleasure/Female Fap-femalefap-schlick.png";
	$rages['taco'] = "img/Pleasure/Gonna fuck that taco-taco.png";
	$rages['creepymegusta'] = "img/Pleasure/Me Gusta Mucho Creepy-creepymegusta-cmg-evilmegusta-emg.png";
	$rages['cmg'] = "img/Pleasure/Me Gusta Mucho Creepy-creepymegusta-cmg-evilmegusta-emg.png";
	$rages['evilmegusta'] = "img/Pleasure/Me Gusta Mucho Creepy-creepymegusta-cmg-evilmegusta-emg.png";
	$rages['emg'] = "img/Pleasure/Me Gusta Mucho Creepy-creepymegusta-cmg-evilmegusta-emg.png";
	$rages['mgperfect'] = "img/Pleasure/Me Gusta Perfect-mgperfect-megustaperfect-mgp.png";
	$rages['megustaperfect'] = "img/Pleasure/Me Gusta Perfect-mgperfect-megustaperfect-mgp.png";
	$rages['mgp'] = "img/Pleasure/Me Gusta Perfect-mgperfect-megustaperfect-mgp.png";
	$rages['bepistrollingyoubetter'] = "img/Pleasure/Me Gusta-bepistrollingyoubetter-megusta-mg.png";
	$rages['megusta'] = "img/Pleasure/Me Gusta-bepistrollingyoubetter-megusta-mg.png";
	$rages['mg'] = "img/Pleasure/Me Gusta-bepistrollingyoubetter-megusta-mg.png";
	$rages['nmg'] = "img/Pleasure/No Me Gusta-nmg-nomegusta.png";
	$rages['nomegusta'] = "img/Pleasure/No Me Gusta-nmg-nomegusta.png";
	$rages['ohyes'] = "img/Pleasure/Ohhh Yes-ohyes.png";
	$rages['sonmegusta'] = "img/Pleasure/Son Me Gusta-sonmegusta-smg.png";
	$rages['smg'] = "img/Pleasure/Son Me Gusta-sonmegusta-smg.png";
	$rages['sweetjesus'] = "img/Pleasure/Sweet Jesus Face-sweetjesus-sj.png";
	$rages['sj'] = "img/Pleasure/Sweet Jesus Face-sweetjesus-sj.png";
	$rages['canadianrage'] = "img/Rage/Canadian Rage-canadianrage-canadian.png";
	$rages['canadian'] = "img/Rage/Canadian Rage-canadianrage-canadian.png";
	$rages['rage2'] = "img/Rage/Fuu-rage2-epicrage-fu2.png";
	$rages['epicrage'] = "img/Rage/Fuu-rage2-epicrage-fu2.png";
	$rages['fu2'] = "img/Rage/Fuu-rage2-epicrage-fu2.png";
	$rages['pig'] = "img/Rage/Pig-pig-pigrage.png";
	$rages['pigrage'] = "img/Rage/Pig-pig-pigrage.png";
	$rages['fu'] = "img/Rage/Rage Classic-fu-rage.png";
	$rages['rage'] = "img/Rage/Rage Classic-fu-rage.png";
	$rages['extremerage'] = "img/Rage/Rage Extreme-extremerage-xrage.png";
	$rages['xrage'] = "img/Rage/Rage Extreme-extremerage-xrage.png";
	$rages['ragelion'] = "img/Rage/Rage Lion-ragelion.png";
	$rages['nuclearrage'] = "img/Rage/Rage Nuclear-nuclearrage-nrage-fu3.png";
	$rages['nrage'] = "img/Rage/Rage Nuclear-nuclearrage-nrage-fu3.png";
	$rages['fu3'] = "img/Rage/Rage Nuclear-nuclearrage-nrage-fu3.png";
	$rages['omegarage'] = "img/Rage/Rage Omega-omegarage-orage-fu4.png";
	$rages['orage'] = "img/Rage/Rage Omega-omegarage-orage-fu4.png";
	$rages['fu4'] = "img/Rage/Rage Omega-omegarage-orage-fu4.png";
	$rages['quietrage'] = "img/Rage/Rage Quiet-quietrage.png";
	$rages['awman'] = "img/Sad/Aw Man-awman-whyhands.png";
	$rages['whyhands'] = "img/Sad/Aw Man-awman-whyhands.png";
	$rages['aw'] = "img/Sad/Aw-aw-why.png";
	$rages['why'] = "img/Sad/Aw-aw-why.png";
	$rages['cry'] = "img/Sad/Cry-cry-baw.png";
	$rages['baw'] = "img/Sad/Cry-cry-baw.png";
	$rages['foreveralone'] = "img/Sad/Forever Alone-foreveralone-fa.png";
	$rages['fa'] = "img/Sad/Forever Alone-foreveralone-fa.png";
	$rages['numb'] = "img/Sad/Numb-numb-fear-scared-depressed.png";
	$rages['fear'] = "img/Sad/Numb-numb-fear-scared-depressed.png";
	$rages['scared'] = "img/Sad/Numb-numb-fear-scared-depressed.png";
	$rages['depressed'] = "img/Sad/Numb-numb-fear-scared-depressed.png";
	$rages['uh'] = "img/Sad/Oh No-uh-ohno.png";
	$rages['ohno'] = "img/Sad/Oh No-uh-ohno.png";
	$rages['okay'] = "img/Sad/Okay-okay.png";
	$rages['sad'] = "img/Sad/Sad-sad.png";
	$rages['areyoukiddingme'] = "img/Stupidity/Are You Kidding Me-areyoukiddingme-areyoukidding-stfu-areyoufuckingkiddingme.png";
	$rages['areyoukidding'] = "img/Stupidity/Are You Kidding Me-areyoukiddingme-areyoukidding-stfu-areyoufuckingkiddingme.png";
	$rages['stfu'] = "img/Stupidity/Are You Kidding Me-areyoukiddingme-areyoukidding-stfu-areyoufuckingkiddingme.png";
	$rages['areyoufuckingkiddingme'] = "img/Stupidity/Are You Kidding Me-areyoukiddingme-areyoukidding-stfu-areyoufuckingkiddingme.png";
	$rages['herpderp'] = "img/Stupidity/Herp Derp-herpderp-herp-derp.png";
	$rages['herp'] = "img/Stupidity/Herp Derp-herpderp-herp-derp.png";
	$rages['derp'] = "img/Stupidity/Herp Derp-herpderp-herp-derp.png";
	$rages['ohgodwhy'] = "img/Stupidity/Oh God Why-ohgodwhy.png";
	$rages['retarddog'] = "img/Stupidity/Retard Dog-retarddog-dog.png";
	$rages['dog'] = "img/Stupidity/Retard Dog-retarddog-dog.png";
	$rages['jackie'] = "img/Stupidity/Seriously Chan-jackie-chan.png";
	$rages['chan'] = "img/Stupidity/Seriously Chan-jackie-chan.png";
	$rages['sohardcore'] = "img/Stupidity/So hardcore-hardcore-sohardcore.png";
	$rages['gthefuck'] = "img/Stupidity/The Fuck Female-gthefuck-gtf.png";
	$rages['gtf'] = "img/Stupidity/The Fuck Female-gthefuck-gtf.png";
	$rages['thefuck'] = "img/Stupidity/The Fuck-thefuck-tf.png";
	$rages['tf'] = "img/Stupidity/The Fuck-thefuck-tf.png";
	$rages['gropaga'] = "img/Unofficial/Gropaga-gropaga.png";
	$rages['lgun'] = "img/Unofficial/Gun Left-lgun.png";
	$rages['rgun'] = "img/Unofficial/Gun Right-rgun.png";
	$rages['pickletime'] = "img/Unofficial/Pickle Time-pickletime-pickle.png";
	$rages['pickle'] = "img/Unofficial/Pickle Time-pickletime-pickle.png";
	$rages['closeenough'] = "img/Victorious/Close Enough-closeenough-ce.png";
	$rages['ce'] = "img/Victorious/Close Enough-closeenough-ce.png";
	$rages['freddie'] = "img/Victorious/Freddie Mercury-freddie-hellyes.png";
	$rages['badass'] = "img/Victorious/Freddie Mercury-freddie-hellyes.png";
	$rages['hellyes'] = "img/Victorious/Freddie Mercury-freddie-hellyes.png";
	$rages['fuckyeahwords'] = "img/Victorious/Fuck Yeah Words-fuckyeahwords-fywords.png";
	$rages['fywords'] = "img/Victorious/Fuck Yeah Words-fuckyeahwords-fywords.png";
	$rages['fuckyeah'] = "img/Victorious/Fuck Yeah-fuckyeah-fy.png";
	$rages['fy'] = "img/Victorious/Fuck Yeah-fuckyeah-fy.png";
	$rages['gtfo'] = "img/Victorious/GTFO-gtfo.png";
	$rages['melvinfuckyeah'] = "img/Victorious/Melvin Fuck Yeah-melvinfuckyeah-melvinfy-mfy.png";
	$rages['melvinfy'] = "img/Victorious/Melvin Fuck Yeah-melvinfuckyeah-melvinfy-mfy.png";
	$rages['mfy'] = "img/Victorious/Melvin Fuck Yeah-melvinfuckyeah-melvinfy-mfy.png";
	$rages['thatway'] = "img/Victorious/That Way-thatway.png";

	//get image size
	$size = getimagesize($plugin_path . $rages[$troll]);
	$width = $size[0];
	$height = $size[1];

	//image url
	$image_url = $plugin_url . str_replace(' ', '%20', $rages[$troll]);

	//
	return array(
		$image_url,
		$width,
		$height,
	);
}
