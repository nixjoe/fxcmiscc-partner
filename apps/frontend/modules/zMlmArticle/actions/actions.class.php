<?php
// auto-generated by sfPropelCrud
// date: 2013/07/18 11:33:15
?>
<?php

/**
 * zMlmArticle actions.
 *
 * @package    sf_sandbox
 * @subpackage zMlmArticle
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 3335 2007-01-23 16:19:56Z fabien $
 */
class zMlmArticleActions extends sfActions
{
  public function executeIndex()
  {
    return $this->forward('zMlmArticle', 'list');
  }

  public function executeList()
  {
    $this->mlm_articles = MlmArticlePeer::doSelect(new Criteria());
  }

  public function executeShow()
  {
    $this->mlm_article = MlmArticlePeer::retrieveByPk($this->getRequestParameter('article_id'));
    $this->forward404Unless($this->mlm_article);
  }

  public function executeCreate()
  {
    $this->mlm_article = new MlmArticle();

    $this->setTemplate('edit');
  }

  public function executeEdit()
  {
    $this->mlm_article = MlmArticlePeer::retrieveByPk($this->getRequestParameter('article_id'));
    $this->forward404Unless($this->mlm_article);
  }

  public function executeUpdate()
  {
    if (!$this->getRequestParameter('article_id'))
    {
      $mlm_article = new MlmArticle();
    }
    else
    {
      $mlm_article = MlmArticlePeer::retrieveByPk($this->getRequestParameter('article_id'));
      $this->forward404Unless($mlm_article);
    }

    $mlm_article->setArticleId($this->getRequestParameter('article_id'));
    $mlm_article->setArticleTitle($this->getRequestParameter('article_title'));
    $mlm_article->setArticleType($this->getRequestParameter('article_type'));
    $mlm_article->setArticleCategory($this->getRequestParameter('article_category'));
    $mlm_article->setArticleContent($this->getRequestParameter('article_content'));
    $mlm_article->setReadQty($this->getRequestParameter('read_qty'));
    $mlm_article->setPubliserName($this->getRequestParameter('publiser_name'));
    $mlm_article->setStatusCode($this->getRequestParameter('status_code'));
    $mlm_article->setCreatedBy($this->getRequestParameter('created_by'));
    if ($this->getRequestParameter('created_on'))
    {
      list($d, $m, $y) = sfI18N::getDateForCulture($this->getRequestParameter('created_on'), $this->getUser()->getCulture());
      $mlm_article->setCreatedOn("$y-$m-$d");
    }
    $mlm_article->setUpdatedBy($this->getRequestParameter('updated_by'));
    if ($this->getRequestParameter('updated_on'))
    {
      list($d, $m, $y) = sfI18N::getDateForCulture($this->getRequestParameter('updated_on'), $this->getUser()->getCulture());
      $mlm_article->setUpdatedOn("$y-$m-$d");
    }

    $mlm_article->save();

    return $this->redirect('zMlmArticle/show?article_id='.$mlm_article->getArticleId());
  }

  public function executeDelete()
  {
    $mlm_article = MlmArticlePeer::retrieveByPk($this->getRequestParameter('article_id'));

    $this->forward404Unless($mlm_article);

    $mlm_article->delete();

    return $this->redirect('zMlmArticle/list');
  }
}