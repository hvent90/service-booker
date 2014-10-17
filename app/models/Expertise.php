<?php namespace MyApp;

class Expertise extends \Eloquent {

	/**
	 * Creates a new Expertise and returns the Expertise Object.
	 * @return [type] [description]
	 */
	public function createExpertise($title, $notes, $id = null)
	{
		$advisor 		= Advisor::find($id);
		// $expertiseGroup = ExpertiseGroup::find($expertiseGroup_id);

		$expertise        = new Expertise;
		$expertise->title = $title;
		$expertise->notes = $notes;

		$expertise->save();

		if ($id == null)
		{
			return $expertise;
		}

		// if ($expertiseGroup_id == null) {
		// 	return $expertise;
		// }

		$advisor->expertise()->attach($expertise);
		// $expertiseGroup->expertise()->attach($expertise);

		return $expertise;
	}

	/**
	 * Edits an existing Expertise and returns the Expertise Object.
	 * @return [type] [description]
	 */
	public function editExpertise($title, $notes, $id)
	{
		$expertise = Expertise::find($id);
		$expertise->title  = $title;
		$expertise->notes = $notes;
		$expertise->save();

		return $expertise;
	}

	public function connectExpertiseToAdvisor($expertise, $advisor_id)
	{
		foreach ($expertise as $exp_id)
		{
			$advisor = Advisor::find($advisor_id);
			$advisor->expertise()->attach($exp_id);
		}

		return $expertise;
	}

	public function connectExpertiseToExpertiseGroup($expertise, $expertiseGroup_id)
	{
		foreach ($expertiseGroup_id as $expG_id)
		{
			$expertiseGroup = ExpertiseGroup::find($expG_id);
			$expertiseGroup->expertise()->attach($expertise);
		}

		return $expertise;
	}

	/**
	 * Edits an existing Expertise and returns the Expertise Object.
	 * @return [type] [description]
	 */
	public function destroyExpertise($id)
	{
		$expertise = Expertise::find($id);

		$expertise->delete();

		return 'happy days';
	}

	public function disconnectExpertiseToAdvisor($expertise, $advisor_id)
	{
		foreach ($expertise as $exp_id)
		{
			$advisor = Advisor::find($advisor_id);
			$advisor->expertise()->detach($exp_id);
		}

		return $expertise;
	}

	public function disconnectExpertiseToExpertiseGroup($expertise, $expertiseGroup_id)
	{
		foreach ($expertiseGroup_id as $expG_id)
		{
			$expertiseGroup = ExpertiseGroup::find($expG_id);
			$expertiseGroup->expertise()->detach($expertise);
		}

		return $expertise;
	}

	public function expertiseContainedByAdvisor($advisor_id, $just_id = null)
	{
		$advisor = Advisor::find($advisor_id);
		if ($just_id == '1')
		{
			return $expertiseContainedByAdvisor = $advisor->expertise()->lists('expertise_id');
		}

		$expertiseContainedByAdvisor = $advisor->expertise()->lists('title', 'expertise_id');

		return $expertiseContainedByAdvisor;
	}

	public function expertiseGroupsContainedByExpertise($just_id = null)
	{
		if ($just_id == '1')
		{
			return $expertiseGroupsContainedByExpertise = $this->expertiseGroups()->lists('name', 'expertise_group_id');
		}

		$expertiseGroupsContainedByExpertise = $this->expertiseGroups()->lists('name', 'expertise_group_id');

		return $expertiseGroupsContainedByExpertise;
	}

	public function expertiseNotContainedByAdvisor($advisor_id)
	{
		if ($this->expertiseContainedByAdvisor($advisor_id) == null)
		{
			$expertiseNotContainedByAdvisor = Expertise::lists('title', 'id');

			return $expertiseNotContainedByAdvisor;
		}
		$expertiseNotContainedByAdvisor =
			Expertise::whereNotIn('id', $this->expertiseContainedByAdvisor($advisor_id, 1))
			->lists('title', 'id');


		return $expertiseNotContainedByAdvisor;
	}

	public function expertiseGroupsNotContainedByExpertise()
	{

		$listOfIdsOfGroupsContainedByExpertise = [];

		foreach ($this->expertiseGroups()->get() as $expGroup) {
			$listOfIdsOfGroupsContainedByExpertise[] = $expGroup->id;
		}

		if ($listOfIdsOfGroupsContainedByExpertise != null) {
			$expertiseGroupsNotContainedByExpertise =
				ExpertiseGroup::whereNotIn('id', $listOfIdsOfGroupsContainedByExpertise)
				->lists('name', 'id');
		}


		if ($this->expertiseGroupsContainedByExpertise() == null)
		{
			$expertiseGroupsNotContainedByExpertise = ExpertiseGroup::lists('name', 'id');

			return $expertiseGroupsNotContainedByExpertise;
		}

		// dd(ExpertiseGroup::whereNotIn('id', $this->expertiseGroupsContainedByExpertise(1)->lists('name', 'id')));
		return $expertiseGroupsNotContainedByExpertise;
	}

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'expertise';

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $hidden = [];

	/**
	 * Attributes included in the model's JSON form.
	 * @var [type]
	 */
	protected $fillable = ['title', 'notes'];

	/**
	 * Many-to-many relationship
	 * @return [type] [description]
	 */
	public function advisors()
    {
        return $this->belongsToMany('\MyApp\Advisor');
    }

    public function availabilities()
    {
        return $this->belongsToMany('\MyApp\Availability');
    }

    public function expertiseGroups()
    {
    	return $this->belongsToMany('\MyApp\ExpertiseGroup', 'expertisegroup_expertise');
    }

}
