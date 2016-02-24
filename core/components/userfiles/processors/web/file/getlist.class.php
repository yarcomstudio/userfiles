<?php

require_once dirname(dirname(dirname(__FILE__))) . '/mgr/file/getlist.class.php';

class modWebUserFileGetListProcessor extends modUserFileGetListProcessor
{
    public $classKey = 'UserFile';
    public $defaultSortField = 'rank';
    public $defaultSortDirection = 'ASC';
    public $languageTopics = array('userfiles');
    public $permission = '';

    /** @var UserFile $object */
    public $object;
    /** @var UserFiles $UserFiles */
    public $UserFiles;
    /** @var modMediaSource $mediaSource */
    public $mediaSource;

    /** {@inheritDoc} */
    public function initialize()
    {
        $initialize =  parent::initialize();

        $propKey = $this->getProperty('propkey');
        if (empty($propKey)) {
            return $this->UserFiles->lexicon('err_propkey_ns');
        }

        $properties = $this->UserFiles->getProperties($propKey);
        if (empty($properties)) {
            return $this->UserFiles->lexicon('err_properties_ns');
        }

        foreach (array('class', 'parent', 'list', 'createdby', 'source', 'active', 'anonym', 'session') as $key) {
            $this->setProperty($key, $properties[$key]);
        }

        if(empty($this->modx->user->id)) {
            $this->setProperty('session', session_id());
        }

        return $initialize;
    }

    /** {@inheritDoc} */
    public function prepareArray(array $row)
    {
        $row['active'] = !empty($row['active']);
        $row['cls'] = $row['active'] ? 'active' : 'inactive';


        if (!empty($row['thumbnail'])) {
            $row['dyn_thumbnail'] = $row['thumbnail'] . '?t=' . $row['size'];
        }
        $row['dyn_url'] = $row['url'] . '?t=' . $row['size'];

        $row['format_size'] = $this->UserFiles->Tools->formatFileSize($row['size']);
        $row['format_createdon'] = $this->UserFiles->Tools->formatFileCreatedon($row['createdon']);

        return $row;
    }

}

return 'modWebUserFileGetListProcessor';