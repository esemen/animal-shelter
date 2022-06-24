<?php
return [
    'animal_image_path' => env('MTAR_ANIMAL_IMAGE_PATH', 'photos/animals'),
    'application_upload_path' => env('MTAR_APPLICATION_UPLOAD_PATH', 'uploads/applications'),

    'avid' => [
        'organisation' => [
            'orgserial' => env('AVID_ORG_SERIAL', ''),
            'orgpassword' => env('AVID_ORG_PASSWORD', ''),
            'orgname' => env('AVID_ORG_NAME', 'MTAR'),
            'orgpostcode' => env('AVID_ORG_POSTCODE', '')
        ]
    ],

    'google_api_key' => env('MTAR_GOOGLE_API_KEY', ''),

    'animal_attributes' => [
        'dogs' => [
            'only_animal' => [
                'label' => 'Only Dog',
                'public' => true,
                'publicLabel' => 'Only Dog',
            ],
            'cats' => [
                'label' => 'Cats',
                'public' => true,
                'publicLabel' => 'Good with Cats',
            ],
            'children' => [
                'label' => 'Children',
                'public' => true,
                'publicLabel' => 'Good with Children',
            ],
            'home_together' => [
                'label' => 'Home Together',
                'public' => true,
                'publicLabel' => 'Bonded Pair',
            ],
            'special_home' => [
                'label' => 'Special Home',
                'public' => false,
                'publicLabel' => 'Special Home',
            ],
            'show_passport' => [
                'label' => 'Show Passport',
                'public' => false,
                'publicLabel' => 'Has Passport',
            ],
        ],
        'cats' => [
            'only_animal' => [
                'label' => 'Only Cat',
                'public' => true,
                'publicLabel' => 'Only Cat',
            ],

            'dogs' => [
                'label' => 'Dogs',
                'public' => true,
                'publicLabel' => 'Good with Dogs'
            ],
            'children' => [
                'label' => 'Children',
                'public' => true,
                'publicLabel' => 'Good with Children',
            ],
            'home_together' => [
                'label' => 'Home Together',
                'public' => true,
                'publicLabel' => 'Bonded Pair',
            ],
            'special_home' => [
                'label' => 'Special Home',
                'public' => false,
                'publicLabel' => 'Special Home',
            ],
            'show_passport' => [
                'label' => 'Show Passport',
                'public' => false,
                'publicLabel' => 'Has Passport',
            ],

        ],

    ],

    'animal_form' => [
        'medical_notes_template' => '<table class="table table-condensed medical-table">
                                          <tbody>
                                            <tr>
                                              <th scope="row">Date :</th>
                                              <td></td>
                                              <th scope="row">Seen By :</th>
                                              <td></td>
                                            </tr>
                                            <tr>
                                              <th scope="row">Notes :</th>
                                              <td colspan="3"></td>
                                            </tr>
                                            <tr>
                                              <th scope="row">Medication :</th>
                                              <td colspan="3"></td>
                                            </tr>
                                          </tbody>
                                        </table>'
    ],

    'application_form' => [
        'options' => [
            'applied_before' => [
                'yes' => 'Yes I have adopted an animal from Many Tears before.',
                'unsuccessful' => 'Yes I have applied to adopted an animal from Many Tears but was unsuccessful',
                'no' => 'No I have never applied to adopt from Many Tears before'
            ],
            'property' => [
                'type' => [
                    'House',
                    'Bungalow',
                    'Flat',
                    'Mobile Home',
                    'Barge/Boat House',
                    'Other'
                ],
                'ownership' => [
                    'own' => 'Own',
                    'rent' => 'Rent'
                ]
            ],
            'garden' => [
                'size' => [
                    'no' => 'No Garden',
                    'small' => 'Small',
                    'courtyard' => 'Courtyard',
                    'medium' => 'Medium',
                    'large' => 'Large',
                    'extreme' => 'Extremely Large',
                    'acres' => 'Acres'
                ],
                'separate' => [
                    'yes' => 'Yes',
                    'no' => 'No',
                    'wrap' => 'Wrap around garden'
                ],
                'communal' => [
                    'no' => 'No my garden is not communal',
                    'yes' => 'Yes I have a communal garden',
                    'own' => 'I have my own garden but others have access through it'
                ],
                'fence' => [
                    'less' => 'Less than 1ft /0.3m',
                    '1ft' => '1ft / 0.3m',
                    '2ft' => '2ft / 0.6m',
                    '3ft' => '3ft / 0.9m',
                    '4ft' => '4ft / 1.2m',
                    '5ft' => '5ft / 1.5m',
                    '6ft' => '6ft / 1.8m',
                    'more' => 'More than 6ft / 1.8m',
                ],
                'pool' => [
                    'pond-uncovered' => 'I have an uncovered pond',
                    'pond-covered' => 'I have pond that is covered/enclosed',
                    'pool-uncovered' => 'I have an uncovered swimming pool',
                    'pool-covered' => 'I have a swimming pool that is covered/enclosed',
                    'no' => 'I don\'t have a pond or swimming pool'
                ],
                'kennel' => [
                    'yes' => 'Yes',
                    'no' => 'No',
                ]
            ],
            'occupation' => [
                'wfh' => [ // Work from home
                    'yes' => 'Yes',
                    'own' => 'Yes I own my own business which is run from my home',
                    'no' => 'No'
                ],
                'wfh_kept' => [
                    'same' => 'The dog is in the same room',
                    'separate' => 'The dog is kept in a separate room',
                ],
                'hours_left' => [
                    '1h' => 'Up to 1 hour',
                    '2h' => 'Up to 2 hours',
                    '3h' => 'Up to 3 hours',
                    '4h' => 'Up to 4 hours',
                    '5h' => 'Up to 5 hours',
                    '5h+' => 'More than 5 hours',
                ],
                'days_left' => [
                    '1d' => '1 day a week',
                    '2d' => '2 days a week',
                    '3d' => '3 days a week',
                    '4d' => '4 days a week',
                    '5d' => '5 days a week',
                    '5d+' => 'More than 5 days a week',
                ],
            ],
            'experience' => [
                'reactive_dogs' => [
                    'yes' => 'Yes',
                    'no' => 'No'
                ],
            ],
            'care' => [
                'neutered' => [
                    'yes' => 'Yes',
                    'no' => 'No',
                    'na' => 'Not Applicable'
                ],
                'inoculated' => [
                    'yes' => 'Yes',
                    'no' => 'No',
                ],
                'exercise_areas' => [
                    'Road Walks',
                    'Parks',
                    'Fields',
                    'Woods',
                    'Beaches',
                    'Other',
                ],
                'puppy_neuter' => [
                    'yes' => 'Yes',
                    'no' => 'No',
                    'na' => 'Not Applicable'
                ],
                'insurance' => [
                    'payg' => 'Pay as you go',
                    'insurance' => 'Insurance'
                ]
            ],
            'plans' => [
                'holiday' => [
                    'no' => 'I confirm we have no holidays booked',
                    '3m' => 'I confirm we have a holiday booked within the next 3 months',
                    '6m' => 'I confirm we have a holiday booked within the next 6 months',
                ],
                'move' => [
                    'yes' => 'Yes',
                    'no' => 'No',
                ],
                'collect' => [
                    'yes' => 'I confirm I am able to collect my dog within 3 days of passing my home check',
                    'no' => 'I am unable to collect my dog within 3 days of passing my home check',
                ]
            ],
            'found_through' => [
                'Word of mouth',
                'Internet Search Engine',
                'Facebook',
                'Another rescue',
                'Advertisements',
                'Other',
            ],
            'confirmations' => [
                'live' => 'I understand that all members of the household and any dog that will be living
                                with the animal I want to adopt MUST come and meet the animal on the day of adoption.',
                'payment' => 'I have read and understand the adoption fee and agree this will be paid in full by
                                cash or cheque at the time of adoption. We do not accept payment by card.',
                'privacy' => 'Your privacy is very important to us and we always keep your information safe.
                                Please tick here to give us your consent to store your personal details to enable us
                                to contact you regarding your application via email or by phone and to be able to
                                process your application form. As part of the application process we may need to
                                share your details to a fosterer, volunteer or home checker in order for us to
                                complete the adoption process.',
                'microchip' => 'Following a successful adoption we will need to share your details to register a
                                dog\'s microchip and may need to pass your details to a behaviourist or other
                                volunteer within our organisation. By ticking this box you are allowing us to do this.',
            ]
        ]
    ],
    'cat_application_form' => [
        'options' => [
            'applied_before' => [
                'yes' => 'Yes I have adopted an animal from Many Tears before.',
                'unsuccessful' => 'Yes I have applied to adopted an animal from Many Tears but was unsuccessful',
                'no' => 'No I have never applied to adopt from Many Tears before'
            ],
            'property' => [
                'type' => [
                    'House',
                    'Bungalow',
                    'Flat',
                    'Mobile Home',
                    'Barge/Boat House',
                    'Other'
                ],
                'ownership' => [
                    'own' => 'Own',
                    'rent' => 'Rent'
                ]
            ],
            'garden' => [
                'yes' => 'Yes',
                'no' => 'No'
            ],
            'occupation' => [
                'wfh' => [ // Work from home
                    'yes' => 'Yes',
                    'own' => 'Yes I own my own business which is run from my home',
                    'no' => 'No'
                ],
            ],
            'experience' => [
                'reactive_dogs' => [
                    'not_reacted' => 'Yes my dog(s) has met cats and not reacted to them',
                    'happy_with_cats' => 'Yes my dog(s) has lived happily with cats',
                    'no' => 'No my dog(s) has never met or lived with a cat'
                ],
            ],
            'care' => [
                'neutered' => [
                    'yes' => 'Yes',
                    'no' => 'No',
                    'na' => 'Not Applicable'
                ],
                'kitten_neuter' => [
                    'yes' => 'Yes I agree',
                    'no' => 'No I don\'t agree',
                    'na' => 'Not Applicable'
                ],
                'inoculated' => [
                    'yes' => 'Yes',
                    'no' => 'No',
                ],
                'insurance' => [
                    'payg' => 'Pay as you go',
                    'insurance' => 'Insurance'
                ]
            ],
            'plans' => [
                'holiday' => [
                    'no' => 'I confirm we have no holidays booked',
                    '3m' => 'I confirm we have a holiday booked within the next 3 months',
                    '6m' => 'I confirm we have a holiday booked within the next 6 months',
                ],
                'move' => [
                    'yes' => 'Yes',
                    'no' => 'No',
                ],
                'collect' => [
                    'yes' => 'I confirm I am able to collect my cat within 3 days of passing my home check',
                    'no' => 'I am unable to collect my cat within 3 days of passing my home check',
                ]
            ],
            'found_through' => [
                'Word of mouth',
                'Internet Search Engine',
                'Facebook',
                'Another rescue',
                'Advertisements',
                'Other',
            ],
            'confirmations' => [
                'live' => 'I understand that all members of the household that will be living with the cat I want to adopt MUST come and meet the cat on the day of adoption',
                'payment' => 'I have read and understand the adoption fee and agree this will be paid in full by
                                cash or cheque at the time of adoption. We do not accept payment by card.',
                'privacy' => 'Your privacy is very important to us and we always keep your information safe.
                                Please tick here to give us your consent to store your personal details to enable us
                                to contact you regarding your application via email or by phone and to be able to
                                process your application form. As part of the application process we may need to
                                share your details to a fosterer, volunteer or home checker in order for us to
                                complete the adoption process.',
                'microchip' => 'Following a successful adoption we will need to share your details to register a
                                dog\'s microchip and may need to pass your details to a behaviourist or other
                                volunteer within our organisation. By ticking this box you are allowing us to do this.',
            ],
            'environment' => [
                'road' => [
                    'busy' => 'Busy/Heavy traffic',
                    'medium' => 'Medium traffic',
                    'rural' => 'Rural/Low traffic',
                    'other' => 'Other'
                ],
                'cat_flap' => [
                    'yes' => 'Yes',
                    'no' => 'No'
                ],
                'indoor_outdoor' => [
                    'indoor' => 'Indoor cat all the time',
                    'indoor_outdoor' => 'Indoor cat with access outside',
                    'outside' => 'The cat will be live outside'
                ]
            ]

        ]
    ],
    'other_application_form' => [
        'options' => [
            'property' => [
                'type' => [
                    'House',
                    'Bungalow',
                    'Flat',
                    'Mobile Home',
                    'Barge/Boat House',
                    'Other'
                ],
                'ownership' => [
                    'own' => 'Own',
                    'rent' => 'Rent'
                ]
            ],
            'garden' => [
                'yes' => 'Yes',
                'no' => 'No'
            ],
            'occupation' => [
                'wfh' => [ // Work from home
                    'yes' => 'Yes',
                    'own' => 'Yes I own my own business which is run from my home',
                    'no' => 'No'
                ],
            ],
            'care' => [
                'neutered' => [
                    'yes' => 'Yes',
                    'no' => 'No',
                    'na' => 'Not Applicable'
                ],
                'inoculated' => [
                    'yes' => 'Yes',
                    'no' => 'No',
                ],
                'insurance' => [
                    'payg' => 'Pay as you go',
                    'insurance' => 'Insurance'
                ]
            ],
            'plans' => [
                'holiday' => [
                    'no' => 'I confirm we have no holidays booked',
                    '3m' => 'I confirm we have a holiday booked within the next 3 months',
                    '6m' => 'I confirm we have a holiday booked within the next 6 months',
                ],
                'move' => [
                    'yes' => 'Yes',
                    'no' => 'No',
                ],
                'collect' => [
                    'yes' => 'I confirm I am able to collect 3 days of passing my home check',
                    'no' => 'I am unable to collect within 3 days of passing my home check',
                ]
            ],
            'found_through' => [
                'Word of mouth',
                'Internet Search Engine',
                'Facebook',
                'Another rescue',
                'Advertisements',
                'Other',
            ],
            'confirmations' => [
                'live' => 'I understand that, depending on the animal I am adopting, I may be asked to bring all members of my household and possibly my other animals (depending on what they are) to collect the animal I am applying for wherever it is located.',
                'payment' => 'I have read and understand the adoption fee and agree this will be paid in full by
                                cash or cheque at the time of adoption. We do not accept payment by card.',
                'privacy' => 'Your privacy is very important to us and we always keep your information safe.
                                Please tick here to give us your consent to store your personal details to enable us
                                to contact you regarding your application via email or by phone and to be able to
                                process your application form. As part of the application process we may need to
                                share your details to a fosterer, volunteer or home checker in order for us to
                                complete the adoption process.',
                'microchip' => 'Following a successful adoption we will need to share your details to register a
                                dog\'s microchip and may need to pass your details to a behaviourist or other
                                volunteer within our organisation. By ticking this box you are allowing us to do this.',
            ],
        ]
    ],
    'assessment_form' => [
                'options' => [
                    'dog' =>[
                        'dog_reaction' => [
                            'Meets all dogs politely and happily.',
                            'Meets all dogs nervously and submissively.',
                            'Shows aggression towards all other dogs but is easily controlled.',
                            'Shows aggression towards all other dogs and is difficult to control.',
                            'Meets large dogs politely and happily.',
                            'Meets large dogs nervously and submissively.',
                            'Shows aggression towards large dogs but is easily controlled.',
                            'Shows aggression towards large dogs and is difficult to control.',
                            'Meets small dogs politely and happily.',
                            'Meets small dogs nervously and submissively.',
                            'Shows aggression towards small dogs but is easily controlled.',
                            'Shows aggression towards small dogs and is difficult to control.',
                            'Very aggressive with all other dogs and cannot be introduced.',
                            'None of these - see additional notes.'
                        ],
                        'meeting_children' => [
                            'Has not met any children.',
                            'Happy to meet/live with children, shows no fear and is completely tolerant of being handled by them.',
                            'Very afraid of children and shows some aggression (any growling).',
                            'Actively aggressive towards children with no signs of fear.',
                            'Shows a little fear of children but is still tolerant.',
                            'None of these - see additional notes.'
                        ],
                        'meeting_people' => [
                            'Happy to meet people and is well mannered.',
                            'Happy to meet people but is a little exuberant.',
                            'Nervous of people but will approach to make friends.',
                            'Nervous of people and will not approach, but not run away.',
                            'Terrified of people and will run to get away when approached.',
                            'None of these - see additional notes.'
                        ],
                        'meeting_cats' => [
                            'Has never met a cat so reaction unknown.',
                            'Will sleep next to or in bed with cat.',
                            'Pays no attention to cats at all.',
                            'Shows interest but will sniff a cat and walk away.',
                            'Unhealthy interest in cats and will not be corrected or distracted.',
                            'Shows great interest & will chase a running cat, but ok nose to nose with a cat.',
                            'None of these - see additional notes.'
                        ],
                        'traffic' => [
                            'Does not yet walk on a lead so has not experienced traffic.',
                            'Pays no attention to traffic.',
                            'Watches traffic but is not afraid.',
                            'Afraid of traffic but sits quietly.',
                            'Very afraid of traffic and tries to bolt.',
                            'Unhealthy interested in traffic and wants to chase.',
                            'None of these - see additional notes.'
                        ],
                        'on_lead' => [
                            'Does not walk on a lead at all.',
                            'Does not yet walk on a lead confidently, but is trying.',
                            'Walks very well and does not pull.',
                            'Pulls a bit but responds well to correction.',
                            'Pulls like a train and needs heavy correction.',
                            'None of these - see additional notes.'
                        ],
                        'travel' => [
                            'Dog travels well in the car and is happy to get in and out.',
                            'Dog is happy to get in and out of the car but is travel sick/drools.',
                            'Dog is unhappy to get in and out of the car and is travel sick/drools.',
                            'None of these - see additional notes.'
                        ],
                        'crate_training' => [
                            'Dog is crate trained but does not sleep in a crate at night.',
                            'Dog is crate trained and sleeps in crate at night.',
                            'Dog is crate trained and is put in a crate if left during the day but not at night.',
                            'Dog is crate trained and is put in a crate if left during the day and at night.',
                            'Dog is unhappy being crated.',
                            'Dog has never been in a crate.',
                            'None of these - see additional notes.'
                        ],
                        'house_training' => [
                            'Dog is completely clean in the house.',
                            'Dog having a few accidents in the house but is only happening over night or during longer times of being left.',
                            'Dog having multiple accidents in the house but is happy and confident to go to the toilet outside on/off the lead.',
                            'Dog having multiple accidents and too worried to go to the toilet outside.',
                            'None of these - see additional notes.'
                        ]
                    ]

                ]
    ],
    'fosterer_form' => [
        'options' => [
            'fostering' => [
                'start' => [
                    'immediately' => 'Immediately',
                    'future' => 'In the future'
                ],
                'continue' => [
                    'yes' => 'Yes',
                    'no' => 'No'
                ],
                'transport' => [
                    'yes' => 'Yes',
                    'no' => 'No'
                ],
                'collection' => [
                    'many_tears' => 'From the Many Tears in Llanelli',
                    'sarn' => 'Carmarthenshire M4 – Sarn Services',
                    'old_bosch' => 'M4 – Junction 34 at the Old Bosch Factory',
                    'cardiff_west' => 'M4 – Cardiff West Services',
                    'magor' => 'M4 - Magor Services',
                    'gordano' => 'M5 – Gordano Services',
                    'leigh_delamere' => 'M4 – Leigh Delamere Services',
                    'chieveley' => 'M4 - Chieveley Services',
                    'reading' => 'M4 – Reading Services',
                    'scotland' => 'Scotland/Northern run'
                ],
                'preferences' => [
                    'puppy' => 'Puppy',
                    'adult' => 'Adult',
                    'senior' => 'Senior',
                    'male' => 'Male',
                    'female' => 'Female',
                    'any' => 'Any breed',
                    'small' => 'Small breeds',
                    'large' => 'Large Breeds',
                    'giant' => 'Giant Breeds'
                ],
                'older' => [
                    'yes' => 'Yes',
                    'no' => 'No'
                ],
                'prospective' => [
                    'yes' => 'Yes',
                    'no' => 'No'
                ],
                'bad_candidate' => [
                    'yes' => 'Yes',
                    'no' => 'No'
                ],
            ],
            'property' => [
                'type' => [
                    'House',
                    'Bungalow',
                    'Flat',
                    'Mobile Home',
                    'Barge/Boat House',
                    'Other'
                ],
                'ownership' => [
                    'own' => 'Own',
                    'rent' => 'Rent'
                ]
            ],
            'garden' => [
                'size' => [
                    'no' => 'No Garden',
                    'small' => 'Small',
                    'courtyard' => 'Courtyard',
                    'medium' => 'Medium',
                    'large' => 'Large',
                    'extreme' => 'Extremely Large',
                    'acres' => 'Acres'
                ],
                'separate' => [
                    'yes' => 'Yes',
                    'no' => 'No',
                    'wrap' => 'Wrap around garden'
                ],
                'communal' => [
                    'no' => 'No my garden is not communal',
                    'yes' => 'Yes I have a communal garden',
                    'own' => 'I have my own garden but others have access through it'
                ],
                'fence' => [
                    'less' => 'Less than 1ft /0.3m',
                    '1ft' => '1ft / 0.3m',
                    '2ft' => '2ft / 0.6m',
                    '3ft' => '3ft / 0.9m',
                    '4ft' => '4ft / 1.2m',
                    '5ft' => '5ft / 1.5m',
                    '6ft' => '6ft / 1.8m',
                    'more' => 'More than 6ft / 1.8m',
                ],
                'pool' => [
                    'pond-uncovered' => 'I have an uncovered pond',
                    'pond-covered' => 'I have pond that is covered/enclosed',
                    'pool-uncovered' => 'I have an uncovered swimming pool',
                    'pool-covered' => 'I have a swimming pool that is covered/enclosed',
                    'no' => 'I don\'t have a pond or swimming pool'
                ],
                'kennel' => [
                    'yes' => 'Yes',
                    'no' => 'No',
                ]
            ],
            'occupants' => [
                'visitor' => [
                    'yes' => 'Yes',
                    'no' => 'No'
                ]
            ],
            'occupation' => [
                'wfh' => [ // Work from home
                    'yes' => 'Yes',
                    'own' => 'Yes I own my own business which is run from my home',
                    'no' => 'No'
                ],
                'wfh_kept' => [
                    'same' => 'The dog is in the same room',
                    'separate' => 'The dog is kept in a separate room',
                ],
                'hours_left' => [
                    '1h' => 'Up to 1 hour',
                    '2h' => 'Up to 2 hours',
                    '3h' => 'Up to 3 hours',
                    '4h' => 'Up to 4 hours',
                    '5h' => 'Up to 5 hours',
                    '5h+' => 'More than 5 hours',
                ],
                'days_left' => [
                    '1d' => '1 day a week',
                    '2d' => '2 days a week',
                    '3d' => '3 days a week',
                    '4d' => '4 days a week',
                    '5d' => '5 days a week',
                    '5d+' => 'More than 5 days a week',
                ],
            ],
            'experience' => [
                'applied_before' => [
                    'yes' => 'Yes',
                    'no' => 'No'
                ],
                'fostered_before' => [
                    'yes' => 'Yes',
                    'no' => 'No'
                ],
                'reactive_dogs' => [
                    'yes' => 'Yes',
                    'no' => 'No'
                ],
                'resident_dogs' => [
                    'yes' => 'Yes',
                    'no' => 'No',
                    'no_dog' => 'I do not have a resident dog'
                ]
            ],
            'care' => [
                'neutered' => [
                    'yes' => 'Yes',
                    'no' => 'No',
                    'na' => 'Not Applicable'
                ],
                'inoculated' => [
                    'yes' => 'Yes',
                    'no' => 'No',
                ],
                'exercise_areas' => [
                    'Road Walks',
                    'Parks',
                    'Fields',
                    'Woods',
                    'Beaches',
                    'Other',
                ],
                'puppy_neuter' => [
                    'yes' => 'Yes',
                    'no' => 'No',
                    'na' => 'Not Applicable'
                ],
                'insurance' => [
                    'payg' => 'Pay as you go',
                    'insurance' => 'Insurance'
                ],
            ],
            'plans' => [
                'holiday' => [
                    'no' => 'I confirm we have no holidays booked',
                    '3m' => 'I confirm we have a holiday booked within the next 3 months',
                    '6m' => 'I confirm we have a holiday booked within the next 6 months',
                ],
                'move' => [
                    'yes' => 'Yes',
                    'no' => 'No',
                ],
                'collect' => [
                    'yes' => 'I confirm I am able to collect my dog within 3 days of passing my home check',
                    'no' => 'I am unable to collect my dog within 3 days of passing my home check',
                ]
            ],
            'found_through' => [
                'Word of mouth',
                'Internet Search Engine',
                'Facebook',
                'Another rescue',
                'Advertisements',
                'Other',
            ],
            'confirmations' => [
                'adopt' => 'If you want to adopt the dog you\'re fostering you MUST let the centre know as soon as possible.
                            Fosterers will not automatically be allowed to adopt the dog if a suitable applicant has come forward.',
                'adoption_fee' => 'I understand if a fosterer adopts the dog they are fostering,
                            the full adoption fee/minimum donation will apply.',
                'unable_to_foster' => 'If you are unable to keep fostering a dog in your care for whatever reason,
                                    Many Tears will make every effort to get it back to either the centre or find another fosterer.
                                    However, if this is not possible we will need you to either keep the dog until an alternative
                                    placement can be found or you will have to return the dog to the rescue yourself.',
                'privacy' => 'Your privacy is very important to us and we always keep your information safe.
                            Please tick here to give us your consent to store your personal details to enable us to contact you regarding
                            your application via email or by phone and to be able to process your application form.
                            As part of the application process we may need to share your details to a fosterer, volunteer or
                            home checker in order for us to complete the adoption process.',
                'microchip' => 'Following a successful adoption we will need to share your details to register a
                                dog\'s microchip and may need to pass your details to a behaviourist or other
                                volunteer within our organisation. By ticking this box you are allowing us to do this.',
            ]
        ]
    ],
    'vetter_form' => [
        'options' => [
            'travel' => [
                '10' => '10 miles',
                '15' => '15 miles',
                '20' => '20 miles',
                '25' => '25 miles',
                '30' => '30 miles',
                '35' => '35 miles',
                '40' => '40 miles',
                '40+' => 'More than 40 miles',
            ],
            'home_check' => [
                'day' => 'Day',
                'evening' => 'Evening',
                'anytime' => 'Anytime',
            ],
            'transport' => [
                'yes' => 'Yes',
                'no' => 'No'
            ],
            'own_dog' => [
                'yes' => 'Yes',
                'no' => 'No'
            ],
            'confirmations' => [
                'privacy' => 'Please tick here to give your consent that MTAR is able to retain your information in order to contact you to discuss your application further and send you any information that we feel you will find relevant to supporting the Rescue. Please note the safety of your personal information is important to us and will be held securely.',
                'erase_data' => 'Please tick here to confirm you understand that you can change your mind and ask us to erase any data we hold for you at any time. For more information on our Privacy Policy please see our page on the website.',
            ]
        ],
    ]
];
