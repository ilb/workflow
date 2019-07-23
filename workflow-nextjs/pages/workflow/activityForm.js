import Link from 'next/link'

function Home() {
  return <div>Welcome to Next.js (activity)!
<Link href="workList">
            <a>workList</a>
          </Link>
  </div>;
}

export default Home;
