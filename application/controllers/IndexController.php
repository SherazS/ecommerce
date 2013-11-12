<?php

class IndexController extends Zend_Controller_Action
{

    public function init()
    {
        /* Initialize action controller here */
    }

    public function indexAction()
    {
        $c = new Criteria();
        $c->setLimit(10);

        $list  = CmsArticlePeer::doSelect($c);

        echo "ARTICLES<br />";

        $articles = array();

        foreach($list as $return) 
        {
            $row = array();
            $row['art id'  ] = $return->getArtId();
            $row['user id' ] = $return->getArtUserId();
            $row['cat id'  ] = $return->getArtCatId();
            $row['title'   ] = $return->getArtTitle();
            $row['text'    ] = $return->getArtText();
            $row['username'] = $return->getUserMain()->getUserName();
            
            $articles[] = $row;
        }
        foreach ($articles as $return) {
            foreach($return as $key=>$value)
            {   
                echo $key . ": ". $value . "<br />";
            }
            echo "<br />";
        }

        $list  = CmsCategoryPeer::doSelect($c);

        echo "<br /><br />CATEGORIES<br />";
        $categories = array();

        foreach($list as $return) 
        {
            $row = array();
            $row['cat id'  ] = $return->getCatId();
            $row['category'] = $return->getCatName();

            $categories[] = $row;
        }
        foreach ($categories as $return) {
            foreach($return as $key=>$value)
            {   
                echo $key . ": ". $value . "<br />";
            }
            echo "<br />";
        }

        $list  = UserMainPeer::doSelect($c);

        echo "<br /><br />USERS<br />";
        $users = array();

        foreach($list as $return) 
        {
            $row = array();
            $row['user id' ] = $return->getUserId();
            $row['name'    ] = $return->getUserName();
            $row['password'] = $return->getUserPass();
            $row['email'   ] = $return->getUserEmail();
            
            $users[] = $row;
        }
        foreach ($users as $return) {
            foreach($return as $key=>$value)
            {   
                echo $key . ": ". $value . "<br />";
            }
            echo "<br />";
        }

/*
        $new2 = new CmsCategory();
        $new2->setCatName('Newer');
        $new3 = new UserMain();
        $new3->setUserId(321);
        $new3->setUserName('Jack');
        $new3->setUserPass('SECRET');
        $new3->setUserEmail('jack@email.com');

        $new = new CmsArticle();
        $new->setArtUserId(123);
        $new->setArtCatId(1);
        $new->setArtTitle('Second Article');
        $new->setArtText('The second article has been added');
        $new->save();

        $newcount = CmsArticlePeer::doCount($c);
        $newlist  = CmsArticlePeer::doSelect($c);

        $newarticles = array();

        foreach($newlist as $return) 
        {
            $row = array();
            $row['title'   ] = $return->getArtTitle();
            $row['text'    ] = $return->getArtText();
            $row['user'    ] = $return->getUserMain()->getUserName();
            $row['category'] = $return->getCmsCategory()->getCatName();
            
            $newarticles[] = $row;
        }
        
        for ($i=0; $i < 5; $i++) { 
            foreach($newarticles[$i] as $key=>$value)
            {   
                echo $key . ": ". $value . "<br />";
            }
        }*/

    }
}