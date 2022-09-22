<?php
$GLOBALS['tools_Pages_if'] = $this->options->tools_Pages_if;
$GLOBALS['tools_Pages'] = array(
    '{your_title}' => $this->options->tools_Pages_title,
    'Moricolor' => $this->options->tools_Pages_url
);
$GLOBALS['bottomTools'] = $this->options->bT_all;
$GLOBALS['bottomTools_hitokoto'] = $this->options->bT_hitokoto;
$GLOBALS['bottomTools_category'] = $this->options->bT_category;
$GLOBALS['bottomTools_tag'] = $this->options->bT_tag;
$GLOBALS['bottomTools_page'] = $this->options->bT_page;
$GLOBALS['bottomTools_search'] = $this->options->bT_search;
$GLOBALS['index_QuickPreview'] = $this->options->index_QuickPreview;
$GLOBALS['index_QuickPreview_Img'] = $this->options->index_QuickPreview_Img;
$GLOBALS['style_TextBar'] = $this->options->style_TextBar;
$GLOBALS['style_TextIndent'] = $this->options->style_TextIndent;
$GLOBALS['style_CommentShow'] = $this->options->style_CommentShow;
$GLOBALS['style_BGPic'] = $this->options->style_BGPic;
$GLOBALS['style_FontWeight'] = $this->options->style_FontWeight;
$GLOBALS['style_Color'] = $this->options->style_Color;
$GLOBALS['beta_MoriGarden'] = $this->options->beta_MoriGarden;
$GLOBALS['beta_MoreFunctions'] = $this->options->beta_MoreFunctions;
//程序改编自https://github.com/SatoSouta/Typecho-plugin-APlayerAtBottom
$GLOBALS['ap_color'] = $this->options->color;
$GLOBALS['ap_volume'] = $this->options->volume;
$GLOBALS['ap_id'] = $this->options->id;
$GLOBALS['ap_cachetime'] = $this->options->cachetime;
$GLOBALS['ap_server'] = $this->options->server;
$GLOBALS['ap_iapi'] = $this->options->api;
//判断是否打开歌词
if($this->options->lrc === '0') {$GLOBALS['ap_lrc_out'] = 3;}else{$GLOBALS['ap_lrc_out'] = 0;}     
//判断是否打开自动播放
if($this->options->autoplay === '0') {$GLOBALS['ap_autoplay_out'] = 'true';}else{$GLOBALS['ap_autoplay_out'] = 'false';}  
//判断歌曲播放方式
if($this->options->order === '0') {$GLOBALS['ap_order_out'] = 'list';}else{$GLOBALS['ap_order_out'] = 'random';}
//判断设置的API
if($GLOBALS['ap_server'] === '0'){
    if($this->options->netease === '0'){
        $GLOBALS['ap_api_out'] = $GLOBALS['ap_iapi'];
        $GLOBALS['ap_apid'] = '0';
    }elseif($this->options->netease === '1'){
        $GLOBALS['ap_api_out'] = 'https://api.baka.fun/netease?type=playlist&id=';
        $GLOBALS['ap_apid'] = '1';
    }elseif($this->options->netease === '2'){
        $GLOBALS['ap_api_out'] = 'https://api.bakaomg.cn/v1/music/netease?use=2&encode=raw&type=playlist&id=';
        $GLOBALS['ap_apid'] = '2';
    }elseif($this->options->netease === '3'){
        $GLOBALS['ap_api_out'] = 'https://api.i-meto.com/meting/api?server=netease&type=playlist&id=';
        $GLOBALS['ap_apid'] = '3';
    }
}elseif($GLOBALS['ap_server'] === '1'){
    if($this->options->tencent === '0'){
        $GLOBALS['ap_api_out'] = $GLOBALS['ap_iapi'];
        $GLOBALS['ap_apid'] = '0';
    }elseif($this->options->tencent === '1'){
        $GLOBALS['ap_api_out'] = "https://api.i-meto.com/meting/api?server=tencent&type=playlist&id=";
        $GLOBALS['ap_apid'] = '1';
    }elseif($this->options->tencent === '2'){
        $GLOBALS['ap_api_out'] = "https://api.bakaomg.cn/v1/music/qq?use=2&encode=raw&type=playlist&id=";
        $GLOBALS['ap_apid'] = '2';
    }
}
if (file_exists(__DIR__ . '/aplayer.json') == false) {
    $data = [
        'last_update' => time(),
        'settings' => [],
        'data' => []
    ];
    $data['settings'] = [
        'id' => $GLOBALS['ap_id'],
        'lrc' => $GLOBALS['ap_lrc_out'],
        'autoplay' => $GLOBALS['ap_autoplay_out'],
        'theme' => $GLOBALS['ap_color'],
        'volume' => $GLOBALS['ap_volume'],
        'order' => $GLOBALS['ap_order_out'],
        'server' => $GLOBALS['ap_server'],
        'api' => $GLOBALS['ap_apid']
    ];
        $data['data'] = @file_get_contents($GLOBALS['ap_api_out'].$GLOBALS['ap_id']."&rand=".mt_rand(0,999999), false, stream_context_create($arrContextOptions));
        file_put_contents(__DIR__ . '/aplayer.json',json_encode($data));
    }else{
        $decode = json_decode(file_get_contents(__DIR__ . '/aplayer.json'), true);
        $oldserver = $decode['settings']['server'];
        $oldapi = $decode['settings']['api'];
        $olddata = $decode['data'];
        //检测缓存是否过期
        if ((time() - $decode['last_update']) < $cachetime) {
            $data = [
                'last_update' => time(),
                'settings' => [],
                'data' => []
            ];
            $data['settings'] = [
                'id' => $GLOBALS['ap_id'],
                'lrc' => $GLOBALS['ap_lrc_out'],
                'autoplay' => $GLOBALS['ap_autoplay_out'],
                'theme' => $GLOBALS['ap_color'],
                'volume' => $GLOBALS['ap_volume'],
                'order' => $GLOBALS['ap_order_out'],
                'server' => $GLOBALS['ap_server'],
                'api' => $GLOBALS['ap_apid']
            ];
            $data['data'] = @file_get_contents($GLOBALS['ap_api_out'].$GLOBALS['ap_id']."&rand=".mt_rand(0,999999), false, stream_context_create($arrContextOptions));
            file_put_contents(__DIR__ . '/aplayer.json',json_encode($data));
        }else{
            //若缓存不过期则重新获取设置内容以防用户设置更新
            $data = [
                'last_update' => $decode['last_update'],
                'settings' => [],
                'data' => []
            ];
            $data['settings'] = [
                'id' => $GLOBALS['ap_id'],
                'lrc' => $GLOBALS['ap_lrc_out'],
                'autoplay' => $GLOBALS['ap_autoplay_out'],
                'theme' => $GLOBALS['ap_color'],
                'volume' => $GLOBALS['ap_volume'],
                'order' => $GLOBALS['ap_order_out'],
                'server' => $GLOBALS['ap_server'],
                'api' => $GLOBALS['ap_apid']
            ];
            if($GLOBALS['ap_iapi'] != $oldapi || $GLOBALS['ap_server'] != $oldserver){
                $data['data'] = @file_get_contents($GLOBALS['ap_api_out'].$GLOBALS['ap_id']."&rand=".mt_rand(0,999999), false, stream_context_create($arrContextOptions));
            }else{
                $data['data'] = $olddata;
            }
            file_put_contents(__DIR__ . '/aplayer.json',json_encode($data));
        }
    }