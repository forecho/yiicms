<?php
$filter_keyword_alert = <<<EOD
    <div class="alert-heading">关键词支持三种格式</div>
    <ul>
        <li>精确匹配。例如：太阳</li>
        <li>简单正则匹配。关键词中间可以跳过一定数量的字符，例如：太{5}阳，将会匹配“太”和“阳”中间有0-5个字符的关键词</li>
        <li>复杂正则匹配。关键词可以是一个完整的正则表达式。如果不熟悉正则表达式，尽量不要使用。</li>
    </ul>
EOD;

return array(
    'invalid_request' => '非法请求',
        
    'Dashboard' => '仪表盘',
    'View' => '查看',
    'Manage' => '管理',
	'Advanced Search' => '高级搜索',
	'Search' => '搜索',
	'Create' => '创建',
	'Save' => '保存',
	
	'Posts' =>'文章',
	'All Posts' =>'所有文章',
	'Create Post' =>'写文章',
	'Update Post' => '更新文章',
	'List Post' => '文章列表',
	'Manage Posts' => '管理文章',
	'Published' => '已发布',
	'Save Draft' => '保存草稿',
	'Move to Trash' => '移至回收站',
	'Forever Delete' => '永久删除',
	'Draft' => '草稿',
	'Restore' => '还原',
	'Trash' => '回收站',
	
	
	
	'Categories' => '分类目录',
	'All Categories' => '所有分类',
	'Create Category' => '创建分类',
	'Update Category' => '更新分类',
	
	// 'Tags' => '标签',
	// 'Create Tag' => '创建标签',
	// 'Update Tag' => '更新标签',
	
	// 'Comments' => '评论',
	// 'Create Comment' => '创建评论',
	// 'Update Comment' => '更新评论',
	
	'Links' => '链接',
	'All Links' => '所有链接',
	'Create Link' => '创建链接',
	'Update Link' => '更新链接',
	
	'Tools' => '工具',
	
	'Settings' => '设置',
	'General Settings' => '常规设置',
	
	'Custom Parameters' => '自定义参数',
    'Create Custom Parameters' => '添加自定义参数',
	
	'Edit Password' => '修改密码',
	'Logout' => '退出登录',
	'Visit Site' => '网站首页',
	
	'Login' => '登录',
	
	
    'site_home' => '网站首页',
    'action_shortcut' => '快捷操作',
    'post_manage' => '文章管理',
    'action_post' => '发布',
    'action_verify' => '审核',
    'today' => '今日',
    'istop_post' => '置顶',
    'query_post' => '查询',
    'article' => '文章',
    'new_post' => '发表',
    'post_tag' => '标签',
    'post_category' => '分类',
    'post_topic' => '主题',
    'post_special' => '专题',
    'post_comment' => '评论',
    'topic_category' => '主题分类',
    'comment_manage' => '评论管理',
    'user_manage' => '用户',
    'system_tool' => '工具',
    'system_setting' => '设置',
    'statistics' => '统计',
    'latest' => '最新',
    'logout_control_center' => '退出登录',
    'orderid_sort_tip' => '排序提示：数字越大，排的越靠前',

    'update' => '更新',
    'updating' => '更新中...',
    'update_error' => '出错',
    'update_complete' => '更新完成',
    'create' => '新建',
    'edit' => '编辑',
    'trash' => '回收站',
    'trash_post' => '扔到回收站',
    'delete' => '删除',
    'forever_delete' => '永久删除',
    'settop' => '置顶',
    'cancel_top' => '取消置顶',
    'setshow' => '显示',
    'sethide' => '隐藏',
    'cancel_delete' => '取消删除',
    'submit' => '提交',
    'submit_post' => '发表文章',
    'return_list_page' => '返回列表',

    /* PostSearchForm */
    'postid' => '文章ID',
    'keyword' => '关键字',
    'author' => '作者',

    'search' => '搜索',
    'tag_search' => '标签查询',
    'post_search' => '文章查询',
    'fuzzy_search' => '模糊查询',
    'post_search_result' => '文章查询结果',

    'post_list_table' => '文章列表',
    'noverify_post_list_table' => '未审核文章列表',
    'tag_list_table' => '标签列表',
    'hottest_tags_list' => '热门标签列表',
    'latest_tags_list' => '最新添加标签',
    'hottest_tags' => '热门标签',
    'tag_latest_label' => '最新标签 {count}',

    'create_category' => '新建分类',
    'edit_category' => '编辑分类',
    'category_list_table' => '分类列表',
    'category_statistics' => '分类统计',
    'show_in_main_nav_menu' => '在网站导航中显示',
    'category_show' => '显示',
    'category_hide' => '隐藏',

    'advert_managent' => '广告管理',
    'adcode_state' => '广告状态',
    'clear_all_caceh' => '清除所有缓存',
    'clear_all_cache_tip' => '广告位在编辑过程中会自动处理缓存，如没有必要，不必清除所有缓存。',
    'clear_advert_all_cache_success' => '清除所有广告代码缓存成功',
    'delete_advert_tip' => '警告：删除广告位会将该广告位下所有广告代码一并删除！',
    'multi_adcode_tip' => '如果一个广告位有多个有效的广告，则启用随机显示其中',

    /* create advert */
    'advert_solt' => '广告位：{name} - {solt}',
    'advert_list_table' => '广告位列表',
    'create_advert' => '添加广告位',
    'advert_enabled' => '开启',
    'advert_disabled' => '关闭',
    'edit_advert' => '修改广告位',
    'save_advert_success' => '{name}&nbsp;保存成功',
    'advert_is_not_exist' => '广告位不存在',
    'adcode_list_table' => '广告列表',
    'adcode_enabled' => '有效',
    'adcode_disabled' => '无效',
    'return_advert_list' => '返回广告位列表',
    'create_adcode' => '添加广告',
    'edit_adcode' => '修改广告',
    'save_adcode_success' => '广告添加成功',

    /* create post */
    'create_post' => '发表文章',
    'edit_post' => '编辑文章',
    'tags_rules' => '标签多间使用英文半角逗号(,)分隔',
    'options' => '选项',
    'state_show' => '显示',
    'home_show' => '首页',
    'hottest_show' => '热门',
    'recommend_show' => '推荐',
    'save_post_success' => '{title}&nbsp;发表成功，<a href="{url}" target="_blank">点击查看</a>',
    'please_select_category' => '请选择分类',
    'please_select_topic' => '请选择主题',
    'set_hot_post_tip' => '请设置文章的缩略图',
    'open_summary' => '添加摘要',

    /* create topic */
    'create_topic' => '新建主题',
    'edit_topic' => '编辑主题',
    'save_topic_success' => '{name}&nbsp;保存成功。',
    'topic_list_table' => '主题列表',
    'topic_statistics' => '主题统计',

    /* create special */
    'create_special' => '新建专题',
    'edit_special' => '编辑专题',
    'save_special_success' => '{name}&nbsp;保存成功。',
    'special_list_table' => '专题列表',
    'special_statistics' => '专题统计',
    'special_enabled' => '上线',
    'special_disabled' => '下线',

    /* create category */
    'create_category' => '新建分类',
    'edit_category' => '编辑分类',
    'save_category_success' => '{name}&nbsp;创建成功。',

    'order_id_save_success' => '排序ID更新成功',
    'order_id_save_error' => '排序ID更新出错：{error}',
        
    'verify_user' => '审核用户',
    'forbidden_user' => '禁用用户',
    'create_user' => '添加用户',
    'edit_user' => '修改账号',
    'search_user' => '搜索用户',
    'today_signup_user' => '今日注册',
    'user_account_list' => '用户列表',
    'user_statistics' => '用户统计',
    'user_create_success' => '{name} 保存成功',
    'user_disabled' => '禁用',
    'user_forbidden' => '禁用',
    'user_enabled' => '启用',
    'user_unverify' => '未审核',
    'reset_password' => '重置密码',
    'operation' => '操作',

    'delete_confirm' => '您确定要执行删除操作？',

    /*
     * model UserSearchForm
     */
    'userid' => '用户ID',

    'user_search_result' => '用户查询结果',

    /* comment manage */
    'latest_comment' => '最新评论',
    'recommend_comment' => '推荐评论',
    'verify_comment' => '审核评论',
    'search_comment' => '搜索评论',
    'comment_list_table' => '评论列表',
    'set_recommend_comment' => '推荐',
    'not_recommend_comment' => '未推荐',
    'set_batch_verify' => '通过',
    'set_batch_reject' => '拒绝',
    'show_comment' => '显示',
    'hide_comment' => '隐藏',
    'delete_comment' => '删除',
    'reload_data' => '重新载入',
    'recommend_word' => '荐',
    'hot_word' => '热',

    /* post manage */
    'create_posts' => '发表文章',
    'latest_posts' => '最新发布',
    'verify_posts' => '审核文章',
    'search_posts' => '搜索文章',
    'hottest_posts' => '热门文章',
    'editor_recommend_posts' => '编辑推荐',
    'home_show_posts' => '首页推荐',
    'istop_posts' => '置顶文章',
    'set_recommend_post' => '推荐文章',
    'cancel_recommend_post' => '取消推荐',
    'set_hottest_post' => '热门',
    'cancel_hottest_post' => '取消热门',
    'has_deleted_posts' => '已删除',
    'delete_success' => '删除成功',
    'set_homeshow_post' => '首页显示',
    'cannel_homeshow_post' => '取消首页显示',
    'attachment' => '附件',
    'avg_score' => '平均分',
    'post_state' => '状态',
    'post_state_disabled' => '隐藏',
    'post_state_enabled' => '显示',
    'post_state_rejected' => '拒绝',
    'post_state_trash' => '回收站',
    'post_state_not_verify' => '未审核',
    'post_state_marker_disabled' => '隐',
    'post_state_marker_rejected' => '拒',
    'post_marker_recommend' => '荐',
    'post_marker_hottest' => '热',
    'post_marker_top' => '顶',
    'post_marker_homeshow' => '首',

    'category_is_not_exist' => '该分类不存在',
    'topic_is_not_exist' => '该主题不存在',
    'select_all' => '全选',
    'reverse_select' => '反选',
    'pass_review' => '通过',
    'sethottest' => '热门',
    'setrecommend' => '推荐',
    'post_preivew' => '预览',
    'post_info_view' => '查看',
    'post_is_not_exist' => '该文章不存在',
    'post_upload_pictures' => '文章图片',
    'post_upload_temp_pictures' => '临时图片',
        
    /* user manager */
    'user_is_not_exist' => '该用户不存在',
    'reset_user_passwd' => '重置用户密码',
    'user_resetpwd_success' => '修改{name}密码成功',
        
    /* config manage */
    'custome_config_params' => '自定义参数',
    'system_config_params' => '系统功能',
    'system_site' => '网站设置',
    'system_cache' => '缓存设置',
    'system_attachments' => '附件设置',

    'display_config_params' => '网站显示',
    'display_template' => '模板',
    'display_ui' => '界面元素',

    'sns_config_params' => '社会化分享',
    'sns_interface' => '接口设置',
    'sns_stats' => '数据统计',
    'sns_template' => '内容模板',

    'view_config_params' => '查看配置参数',
    'edit_config_params' => '编辑配置参数',
    'the_following_names_error' => '以下参数保存出错',
    'cofig_save_success' => '配置参数保存成功',
    'system_config_is_not_allowed_deleted' => '系统配置参数不能删除',
    'custom_config_params' => '自定义参数',
    'create_custom_param' => '添加自定义参数',
    'param_is_not_exist' => '此参数不存在',
    'create_custom_param_name_tip' => '变量名只能使用字母数字下划线组成，且只能用字母开头，不区分大小写，长度5-100字符',
    'create_custom_param_value_tip' => '布尔值使用1和0代表',

    /* comment search form */
    'post_id' => '文章ID',
    'comment_id' => '评论ID',
    'comment_user_id' => '评论人ID',
    'comment_user_name' => '评论人',
    'start_create_time' => '起始时间',
    'end_create_time' => '结束时间',
    'comment_search' => '评论搜索',
    'comment_search_result' => '评论查询结果',
    'comment_create_time' => '评论时间',
    'comment_delete_confirm' => '确定要删除评论吗？',
        
    /* upload file search form */
    'file_url' => '文件URL',
        
    /* upload file manage */
    'search_upload_file' => '搜索附件',
    'upload_file_search' => '附件查询',
    'upload_file_list' => '附件列表',
    'please_select_file_type' => '请选择文件类型',
    'view_picture' => '查看图片',
    'search_result' => '搜索结果',
        
    /* filter keyword manage */
    'filter_keyword_list' => '敏感词列表',
    'cofig_filter_keyword_success' => '敏感词保存成功',
    'filter_keyword_manage' => '敏感词管理',
    'create_filter_keyword' => '添加关键词',
    'multi_create_filter_keyword' => '批量添加',
    'filter_keyword_alert' => $filter_keyword_alert,
    'occurred_following_errors' => '发生以下错误',
    'kwcontent_format_tip' => '一行一个关键词，如果有替换词，使用逗号(,)分隔，例如：傻子,文明用语',
        
    /* friend link manage */
    'friend_link' => '友情链接',
    'create_link' => '新建链接',
    'edit_link' => '编辑链接',
    'save_link_success' => '{name}&nbsp;保存成功。',
    'link_list_table' => '链接列表',
    'link_orderid_sort_tip' => '排序提示：数字越小，排的越靠前',

    /* welcome */
    'welcome_text' => "欢迎使用{appname}管理中心",
    //'not_veryfiy_post_text' => '有&nbsp;<b>{count}</b>&nbsp;个投稿未审核。',
   
    'not_veryfiy_user_text' => '有&nbsp;<b>{count}</b>&nbsp;个用户注册请求未处理。',
    'not_veryfiy_comment_text' => '有&nbsp;<b>{count}</b>&nbsp;个评论未审核。',
    'view_latest_posts' => '查看最新投稿',
    'view_latest_users' => '审核用户',
    'view_latest_comments' => '审核评论',
	
	
	'View All Posts' => '共有&nbsp;<b>{count}</b>&nbsp;篇文章。',
);


