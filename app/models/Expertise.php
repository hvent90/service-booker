<?php namespace MyApp;

class Expertise extends \Eloquent {

	/**
	 * Creates a new Expertise and returns the Expertise Object.
	 * @return [type] [description]
	 */
	public function createExpertise($title, $notes, $id = null)
	{
		$advisor = Advisor::find($id);

		$expertise = new Expertise;
		$expertise->title  = $title;
		$expertise->notes = $notes;
		$expertise->save();

		if ($id == null)
		{
			return $expertise;
		}

		$advisor->expertise()->attach($expertise);

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

	public function connectExpertise($expertise, $advisor_id)
	{
		foreach ($expertise as $exp_id)
		{
			$advisor = Advisor::find($advisor_id);
			$advisor->expertise()->attach($exp_id);
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

	public function disconnectExpertise($expertise, $advisor_id)
	{
		foreach ($expertise as $exp_id)
		{
			$advisor = Advisor::find($advisor_id);
			$advisor->expertise()->detach($exp_id);
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

}
