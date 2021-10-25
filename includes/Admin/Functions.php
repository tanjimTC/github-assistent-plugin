<?php 

namespace Tanjim\GithubAssistent\Admin;

class Functions {

    function __construct()
    {
        add_action( 'wp_ajax_git_user_search', [$this , 'gitUserList_callback'] );
        add_action( 'wp_ajax_nopriv_git_user_search', [$this , 'gitUserList_callback'] );

        add_action( 'wp_ajax_git_user_details', [$this , 'gitUser_details'] );
        add_action( 'wp_ajax_nopriv_git_user_details', [$this , 'gitUser_details'] );

        add_action( 'wp_ajax_git_user_repos', [$this , 'gitUser_repos'] );
        add_action( 'wp_ajax_nopriv_git_user_repos', [$this , 'gitUser_repos'] );

        add_action( 'wp_ajax_git_user_followers', [$this , 'gitUser_followers'] );
        add_action( 'wp_ajax_nopriv_git_user_followers', [$this , 'gitUser_followers'] );

        add_action( 'wp_ajax_git_user_following', [$this, 'gitUser_following'] );
        add_action( 'wp_ajax_nopriv_git_user_following', [$this, 'gitUser_following'] );
    }

    public function gitUserList_callback()
    {

        if( empty( $_POST['nonce'] ) ) wp_die();

        if( wp_verify_nonce( $_POST['nonce'], 'github_assistent_nonce' ) ) {
    
        $searchUsername = (isset($_POST['name']) ? $_POST['name'] : '');
        $request = wp_remote_get( "https://api.github.com/search/users?q=".$searchUsername );
        if(is_wp_error( $request ) ) {
            return false;
        }
        $userData = json_decode(wp_remote_retrieve_body( $request ));
        wp_send_json_success( $userData, 200 );
        
        die();
        }
    }


    public function gitUser_details()
    {

        if( empty( $_POST['nonce'] ) ) wp_die();

        if( wp_verify_nonce( $_POST['nonce'], 'github_assistent_nonce' ) ) {

        $userLoginName = (isset($_POST['userLogin']) ? $_POST['userLogin'] : '');
        $request = wp_remote_get( "https://api.github.com/users/".$userLoginName );
        if( is_wp_error( $request ) ) {
            return false;
        }
        $userData = json_decode(wp_remote_retrieve_body( $request ));
        wp_send_json_success( $userData, 200 );
        
        die();
        }
    }


    public function gitUser_repos()
    {

        if( empty( $_POST['nonce'] ) ) wp_die();

        if( wp_verify_nonce( $_POST['nonce'], 'github_assistent_nonce' ) ) {

        $userLoginName = (isset($_POST['userLogin']) ? $_POST['userLogin'] : '');
        $request = wp_remote_get( "https://api.github.com/users/".$userLoginName."/repos" );
        if( is_wp_error( $request ) ) {
            return false;
        }
        $userData = json_decode(wp_remote_retrieve_body( $request ));
        wp_send_json_success( $userData, 200 );
        
        die();
        }
    }


    public function gitUser_followers (){

        if( empty( $_POST['nonce'] ) ) wp_die();

        if( wp_verify_nonce( $_POST['nonce'], 'github_assistent_nonce' ) ) {

        $userLoginName = (isset($_POST['userLogin']) ? $_POST['userLogin'] : '');
        $request = wp_remote_get( "https://api.github.com/users/".$userLoginName."/followers" );
        if( is_wp_error( $request ) ) {
            return false;
        }
        $userData = json_decode(wp_remote_retrieve_body( $request ));
        wp_send_json_success( $userData, 200 );
        
        die();
        }
    }


    public function gitUser_following (){

        if( empty( $_POST['nonce'] ) ) wp_die();

        if( wp_verify_nonce( $_POST['nonce'], 'github_assistent_nonce' ) ) {

        $userLoginName = (isset($_POST['userLogin']) ? $_POST['userLogin'] : '');
        $request = wp_remote_get( "https://api.github.com/users/".$userLoginName."/following" );
        if( is_wp_error( $request ) ) {
            return false;
        }
        $userData = json_decode(wp_remote_retrieve_body( $request ));
        wp_send_json_success( $userData, 200 );
        
        die();
        }
    }

}