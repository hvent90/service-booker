<?php namespace MyApp;

class ExpertiseGroup extends \Eloquent {

	public function createExpertiseGroup($name, $description)
	{
		$expertiseGroup = new ExpertiseGroup;

		$expertiseGroup->name   	   = $name;
		$expertiseGroup->description = $description;

		$expertiseGroup->save();

		return $expertiseGroup;
	}

	public function editExpertiseGroup($name, $description, $id)
	{
		$expertiseGroup = ExpertiseGroup::find($id);

		$expertiseGroup->name 		 = $name;
		$expertiseGroup->description = $description;

		$expertiseGroup->save();

		return $expertiseGroup;
	}

	public function destroyExpertiseGroup($id)
	{
		$expertiseGroup = ExpertiseGroup::find($id);

		$expertiseGroup->delete();

		return 'happy days';
	}

	public function getAdvisorsWhoHaveAnAvailabilityWithinGroup()
	{
		$expertiseWithinGroup = $this->expertise()->get();
		$advisorsWhoHaveAnExpertiseWithinGroup = [];
		// dd($expertiseWithinGroup);
		foreach ($expertiseWithinGroup as $exp) {
			foreach ($exp->advisors()->get() as $adv) {
				if ($adv->availabilities()->first() != null) {
					foreach ($advisorsWhoHaveAnExpertiseWithinGroup as $advisie) {
						if ($advisie->id == $adv->id) {
							$adv = null;
						}
					}
					if ($adv !== null) {
						$advisorsWhoHaveAnExpertiseWithinGroup[] = $adv;
					}
				}
			}
		}

		if ($advisorsWhoHaveAnExpertiseWithinGroup == null) {
			$advisorsWhoHaveAnExpertiseWithinGroup = false;
		}

		return $advisorsWhoHaveAnExpertiseWithinGroup;

	}

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'expertisegroups';

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
	protected $fillable = ['name', 'description'];

	/**
	 * Many-to-many relationship
	 * @return [type] [description]
	 */
	public function expertise()
    {
        return $this->belongsToMany('\MyApp\Expertise', 'expertisegroup_expertise');
    }

}
