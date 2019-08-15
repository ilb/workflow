import Header from './header'

const layoutStyle = {
  margin: 0,
  padding: 0,
  // border: '1px solid #DDD'
}


export default function Layout(props) {
  // console.log('Layout props', props);
  const loading = props.loading;
  console.log('Layout loading', loading);
  return (
    <div style={layoutStyle}>
      <Header {...props}/>
      {loading ? <div>loading ... </div> : props.children}
    </div>
  )
}
