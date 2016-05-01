## Inspiration

People spend a lot of money on mobile data that never gets put to use. Annually, a staggering $37 billion worth of mobile data gets wasted by Americans. What if you could somehow stop this wastage by renting out your unused data to others around you? Our aim is to provide this service.

## What it does

WeeFee allows you to broadcast a Wi-Fi signal to other devices using your mobile data plan, keeping track of the amount of data each person consumes. Using this information, the people using your data plan can get billed based on how much they use. Surely, the cost of this data is at a fraction of what phone companies would charge. This allows you to make some money from your excess mobile data while also providing internet access to others who may want it. WeeFee also maintains the privacy of users and their activity, as it is built on top of current hotspot technology.

## How we built it

The WeeFee Android app interfaces with existing hotspot technology. We group users into two subsets - lenders and borrowers. Lenders automatically create hotspots that borrowers can recognize. In near real-time, we monitor the amount of data flowing out of connected borrowers and keep a running sum of this amount for each lender. 

No public API exists that lets us easily monitor network traffic or manage hotspots without root access. We got around this by delving deep into Android's source code and using Reflection to expose critical network functionality. We subsequently fed this data through an API we built running on top of a LAMP architecture hosted on AWS.

Our approach is scalable, secure, and lightweight. We also built a data analytics layer so that users can monitor their activity on the application. 

## Challenges we ran into

The main challenge we faced was how to manipulate the WiFi hardware on the device. Android is especially troublesome because different hardware manufacturers support different levels of access - the platform itself is also fragmented, which made it very difficult to initially test functionality.

As we mentioned above, no public APIs exist that let us set up hotspots or easily monitor network traffic. That doesn't mean the code is totally hidden, though! We used Reflection to access private API methods, which we then leveraged to automatically turn on hotspots with pre-configured SSIDs. 

To get around the traffic monitoring issue, we eventually discovered a way to grab the total amount of data sent by a device since it was last booted. Via some more clever hacks, we were able to extrapolate the amount of network traffic passed through a particular device in a given time interval.

Once we got past this, we had to figure out a good way to identify these SSIDs. We experimented with GPS-based identification, but eventually settled on a more simple approach wherein we prefixed SSIDs with a unique identifier.

Finally, we had to come up with a performant, battery efficient mechanism for logging all of this data and choosing between potentially numerous hotspots. 

## Accomplishments that we're proud of

We finished a working prototype that lets users borrow and lend mobile data. This is what we set out to do!

We're also especially happy with our UI, which allows users to easily use the application - there's a single page, the user has to click on a button, and they're off to the races. Our data analytics page is also pretty unique. We show traffic data for each node in a dynamic graph that updates in real time.

## What we learned

We learned a lot about low level Android programming. In particular, how to use private internal Android APIs. We also learned how to effectively handle numerous background services and set up publicly accessible APIs using AWS.

## What's next for WeeFee

The next steps for WeeFee include implementing an account management system with authentication and billing. There is definitely a need for WeeFee - we just need to get the word out.
