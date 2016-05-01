## Inspiration

People spend a lot of money on mobile data that never gets put to use. Annually, a staggering $37 billion worth of mobile data gets wasted by Americans. What if you could somehow stop this wastage by renting out your unused data to others around you? That's where WeeFee comes in.

## What it does

WeeFee allows you to broadcast a Wi-Fi signal to other devices using your mobile data plan, keeping track of the amount of data each person consumes. Using this information, the people using your data plan can get billed based on how much they use. This allows you to make some money from your excess mobile data while also providing internet access to others who may want it.

## How we built it

The WeeFee Android app allows you to either create or connect to a WeeFee Hotspot. The app subsequently takes care of keeping track of all data usage on your network using MAC addresses and unique SSIDs to distinguish users. The app makes use of PHP API we built on top of a MySQL database on AWS to keep track of the data usage across all WeeFee Hotspots.

## Challenges we ran into

The main challenge we faced was how to flesh out the usage of different users based on SSIDs, specifically because the Android SDK does not make these things easily accessible. We had to use reflection to accomplish what we needed to do.

## Accomplishments that we're proud of

Well, we're definitely proud that we made an entire mobile application supported by a back-end server and database. We're also proud to be attempting to solve a problem that a lot of people have faced, including ourselves.

## What we learned

We learned how to set-up an AWS web-server and use PHP as a back-end for a mobile application. We also learned how to manipulate Wi-Fi hotspots to make them WeeFee Hotspots. :)

## What's next for WeeFee

The next steps for WeeFee would include implementing an actual account management system with authentication and billing to allow for real users to benefit from the app. This also includes scaling the application and back-end in such away as to accommodate a large number of users. The future of WeeFee is bright... very bright.
