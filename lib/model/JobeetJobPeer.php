<?php

class JobeetJobPeer extends BaseJobeetJobPeer
{
	static public function getActiveJobs(Criteria $criteria = null)
{
  if (is_null($criteria))
  {
    $criteria = new Criteria();
  }
 
  $criteria->add(JobeetJobPeer::EXPIRES_AT, time(), Criteria::GREATER_THAN);
  $criteria->addDescendingOrderByColumn(self::EXPIRES_AT);
 
  return self::doSelect($criteria);
}
}
