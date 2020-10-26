function cc_post_title_filter($where, &$wp_query) {
    global $wpdb;
    if ( $search_term = $wp_query->get( 'cc_search_post_title' ) ) {
        $where .= ' AND ' . $wpdb->posts . '.post_title LIKE \'%' . $wpdb->esc_like( $search_term ) . '%\'';
    }
    return $where;
}

$args = array(
    'cc_search_post_title' => $search_term,
    'suppress_filters' => FALSE,
    'post_status' => 'publish',
);

add_filter( 'posts_where', 'cc_post_title_filter', 10, 2 );
$posts = get_posts($args);
remove_filter( 'posts_where', 'cc_post_title_filter', 10 );
