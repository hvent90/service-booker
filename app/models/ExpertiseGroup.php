<?php namespace MyApp;

use DB;

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

	public function getAdvisorsWhoHaveAnExpertiseWithinGroup($randomize = null)
	{
		if($randomize) {
			$advisors = Advisor::orderBy(DB::raw('RAND()'))->get();
		} else {
			$advisors = Advisor::all();
		}

		$expertiseWithinGroup = $this->expertise()->get();
		// dd($expertiseWithinGroup->toArray());
		$advisorsWhoHaveAnExpertiseWithinGroup = [];

		foreach($advisors as $advisor) {
			$advisorsExpertises = $advisor->expertise()->get();
			foreach($expertiseWithinGroup as $expInG) {
				foreach($advisorsExpertises as $advExp) {
					if ($expInG->title == $advExp->title) {
						$advisorsWhoHaveAnExpertiseWithinGroup[] = $advisor;
						continue;
					}
				}
			}
		}

		if ($advisorsWhoHaveAnExpertiseWithinGroup == null) {
			return false;
		}

		return array_unique($advisorsWhoHaveAnExpertiseWithinGroup);
	}

	public function getAdvisorsAndAvailWhoHaveAnAvailabilityWithinGroup()
	{
		$advisors = Advisor::all();
		$expertiseWithinGroup = $this->expertise()->get();
		$advisorsWhoHaveAnExpertiseWithinGroup = [];

		foreach($advisors as $advisor) {
			if($advisor->hasExpertiseInGroup($this->id) && $advisor->hasActiveAvailability()) {
				$advisorsWhoHaveAnExpertiseWithinGroup[] = [
					'advisor' => $advisor,
					'availabilities' => $advisor->availabilities()->where('is_booked', '!==', '1')->get()->sortBy(function($availZ) {
											return $availZ->days()->first()['date'];
										})
				];
			}
		}

		return $advisorsWhoHaveAnExpertiseWithinGroup;
	}

	public function getAdvisorsWhoHaveAnAvailabilityWithinGroup()
	{
		$advisors = Advisor::all();
		$expertiseWithinGroup = $this->expertise()->get();
		$advisorsWhoHaveAnExpertiseWithinGroup = [];
		$alreadyAddedAdvisorIds = [];
		$break = 0;

		foreach($advisors as $advisor) {
			if($advisor->availabilities()->first() !== null) {
				$expertisesOfAdv = $advisor->expertise()->get();
				foreach($expertisesOfAdv as $exp) {
					if($exp->isInGroup($this)) {
						$advisorsWhoHaveAnExpertiseWithinGroup[] = $advisor;
						$break = 1;
					}
					if($break == 1) {
						// break;
					}
				}
			}
		}

		if ($advisorsWhoHaveAnExpertiseWithinGroup == null) {
			return false;
		}


		return array_unique($advisorsWhoHaveAnExpertiseWithinGroup);

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
